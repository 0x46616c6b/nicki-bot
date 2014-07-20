<?php

namespace Systemli\NickiBotBundle\Command;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Systemli\Component\Twitter\Model\Tweet;
use Systemli\Component\Twitter\Model\TweetInterface;

/**
 * @author louis <louis@systemli.org>
 */
class NickiBotCommand extends ContainerAwareCommand
{
    const OPTION_LIMIT = 'limit';
    const OPION_DRY_RUN = 'dry-run';

    protected function configure()
    {
        $this
            ->setName('nickibot:run')
            ->setDescription('Run the bot')
            ->addOption(self::OPTION_LIMIT, 'l', InputOption::VALUE_OPTIONAL, 'Limit for the tweets we replying', 5)
            ->addOption(self::OPION_DRY_RUN, NULL, InputOption::VALUE_NONE, "Test the generated Tweets")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $app = $this->getContainer()->get('systemli.twitter.application.app');
        $limit = $input->getOption(self::OPTION_LIMIT);
        $tweets = array();
        AnnotationRegistry::registerLoader('class_exists');
        $serializer = SerializerBuilder::create()->build();

        $result = $app->search('"T-Shirt"', ['lang' => 'de', 'result_type' => 'resent', 'count' => $limit]);

        if (isset($result['statuses'])) {
            foreach($result['statuses'] as $status) {
                $tweets[] = $serializer->deserialize(json_encode($status), 'Systemli\Component\Twitter\Model\Tweet', 'json');
            }

            $replyHelper = $this->getContainer()->get('systemli.twitter.helper.reply');

            /** @var $tweet TweetInterface */
            foreach ($tweets as $tweet) {
                if ($replyHelper->isPossibleReply($tweet)) {
                    try {
                        $message = $replyHelper->generateReplyMessage($tweet);

                        if (OutputInterface::VERBOSITY_VERBOSE) {
                            $this->verboseReply($output, $tweet, $message);
                        }

                        if (!$input->getOption(self::OPION_DRY_RUN)) {
                            $result = $app->reply($message, $tweet->getId());
                            $answer = $serializer->deserialize(json_encode($result), 'Systemli\Component\Twitter\Model\Tweet', 'json');

                            if ($answer instanceof TweetInterface) {
                                $this->getContainer()->get('systemli.twitter.locker.tweet_locker')->lock($tweet);
                            } else {
                                $this->getLogger()->error("reply_error", array('result' => json_encode($answer)));
                            }
                        }

                        $this->getContainer()->get('systemli.twitter.locker.tweet_locker')->lock($tweet);
                    } catch (\Exception $e) {
                        $this->getLogger()->alert("reply_error", array($e->getMessage()));
                    }
                }
            }

        }
    }

    /**
     * @return Logger
     */
    protected function getLogger()
    {
        return $this->getContainer()->get('logger');
    }

    /**
     * @param OutputInterface $output
     * @param TweetInterface $tweet
     * @param $message
     */
    protected function verboseReply(OutputInterface $output, TweetInterface $tweet, $message)
    {
        $output->writeln(
            sprintf(
                "<info>ID: %s # User: %s (%s)</info>\n%s\n---\n<comment>%s</comment>\n%s",
                $tweet->getId(),
                $tweet->getUser()->getScreenName(),
                $tweet->getUser()->getId(),
                $tweet->getText(),
                $message,
                str_repeat('-', strlen($message))
            )
        );
    }
}