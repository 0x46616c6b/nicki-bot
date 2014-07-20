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
            ->addOption(self::OPTION_LIMIT, 'l', InputOption::VALUE_OPTIONAL, 'Limit for the tweets we replying', 1)
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

        $reply = $app->search('"T-Shirt"', ['lang' => 'de', 'result_type' => 'resent', 'count' => 50]);

        if (isset($reply['statuses'])) {
            foreach($reply['statuses'] as $status) {
                $tweets[] = $serializer->deserialize(json_encode($status), 'Systemli\Component\Twitter\Model\Tweet', 'json');
            }

            $replyHelper = $this->getContainer()->get('systemli.twitter.helper.reply');
            $count = 0;

            /** @var $tweet TweetInterface */
            foreach ($tweets as $tweet) {
                if ($count >= $limit) {
                    continue;
                }

                if ($replyHelper->isPossibleReply($tweet)) {
                    try {
                        $message = $replyHelper->generateReplyMessage($tweet);

                        if (OutputInterface::VERBOSITY_VERBOSE) {
                            $this->verboseReply($output, $tweet, $message);
                        }

                        if (!$input->getOption(self::OPION_DRY_RUN)) {
                            $reply = $app->reply($message, $tweet->getId());
                            $reply = $serializer->deserialize(json_encode($reply), 'Systemli\Component\Twitter\Model\Tweet', 'json');

                            if ($reply instanceof TweetInterface) {
                                $this->getContainer()->get('systemli.twitter.locker.tweet_locker')->lock($tweet);

                                $count += 1;
                                sleep(mt_rand(5,25));
                            } else {
                                $this->getLogger()->error("reply_error", array('result' => json_encode($reply)));
                            }
                        }
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
                "<info>ID: %s # User: %s (%s)</info>\n%s\n%s\n---\n<comment>%s</comment>\n%s",
                $tweet->getId(),
                $tweet->getUser()->getScreenName(),
                $tweet->getUser()->getId(),
                $tweet->getCreatedAt()->format('r T'),
                $tweet->getText(),
                $message,
                str_repeat('-', strlen($message))
            )
        );
    }
}