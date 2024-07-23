<?php

namespace Espo\Custom\Controllers;

use Espo\Core\Exceptions\Error;

class AutoCRM extends \Espo\Core\Templates\Controllers\Base
{
    public function actionCheckEmails($request, $data)
    {
        if (is_object($data)) $parsedData = (array) $data;
        else  $parsedData = json_decode($data, true);

        if (json_last_error() !== JSON_ERROR_NONE) 
            throw new Error('Invalid JSON data: ' . json_last_error_msg());

        if (!isset($parsedData['email']))
            throw new Error('Email is not set in the data.');

        $email = $parsedData['email'];

        $repository = $this->getEntityManager()->getRepository('Contact');
        if (!$repository) 
            throw new Error('Repository not found for Contact.');

        $contacts = $repository->where(['emailAddress' => $email])->find();

        if (empty($contacts)) throw new Error('No contacts found with the provided email address.');

        $result = [];
        foreach ($contacts as $contact) {
            echo "<script>console.log('Contact: " . json_encode($contact) . "');</script>";
            $result[] = [
                'id' => $contact->get('id'),
                'firstName' => $contact->get('firstName'),
                'lastName' => $contact->get('lastName')
            ];
        }
        return $result;
    }
}
