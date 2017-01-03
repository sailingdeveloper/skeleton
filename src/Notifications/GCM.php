<?php

namespace NotificationChannels\AwsSns\Notifications;

class GCM
{
    /** @var array */
    protected $gmcMessage = [];

    /** @var array */
    protected $data = [];

    /** @var array */
    protected $notification = [];

    /**
    * @param string $message   APNS message.
     */
    public function __construct($message = '')
    {
        $this->data['message'] = $message;
    }

    /**
     * Set message content
     *
     * @param string $message  Message content
     *
     * @return $this
     */
    public function message($message)
    {
        $this->data['message'] = $message;
        
        return $this;
    }

    /**
     * Set notification priority
     *
     * @param string $priority
     *
     * @return $this
     */
    public function priority($priority)
    {
        $this->gmcMessage['priority'] = $priority;

        return $this;
    }

    /**
     * Set notification collapse key
     *
     * @param string $collapseKey
     *
     * @return $this
     */
    public function collapseKey($collapseKey)
    {
        $this->gmcMessage['collapse_key'] = $collapseKey;

        return $this;
    }

    /**
     * Set notification time to live
     *
     * @param int $timeToLive
     *
     * @return $this
     */
    public function timeToLive($timeToLive)
    {
        $this->gmcMessage['time_to_live'] = $timeToLive;

        return $this;
    }


    /**
     * Set GCM message data payload
     *
     * @param array $data  Data payload array
     *
     * @return $this
     */
    public function data($data)
    {
        $this->data = array_merge($this->data, $data);

        return $this;
    }

    /**
     * Set GMC notification payload
     *
     * @param array $notification Notification object
     *
     * @return $this
     */
    public function notification($notification)
    {
        $this->notification = array_merge($this->notification, $notification);

        return $this;
    }

    /**
     * Get message in array format
     *
     * @return array
     */
    public function toArray()
    {
        $gmcMessage = $this->gmcMessage;

        $gmcMessage['data'] = $this->data;

        if(!empty($this->notification)){
            $gcmMessage['notification'] = $this->notification;
        }

        return $gmcMessage;
    }

    /**
     * Get message in json format
     *
     * @return string JSON object
     */
    public function toJSON()
    {
        return json_encode($this->toArray());
    }
}
