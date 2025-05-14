<?php
class Validator {
    public static function validate($data) {
        $errors = [];

        if (empty($data['title'])) {
            $errors['title'] = 'Title is required';
        }

        if (!isset($data['price']) || !preg_match('/^\d+(\.\d{2})$/', $data['price']) || (float)$data['price'] <= 0) {
            $errors['price'] = 'Invalid price';
        }

        $date = DateTime::createFromFormat('d.m.Y H:i:s', $data['dateTime']);
        if (!$date) {
            $errors['dateTime'] = 'Invalid date time';
        }

        return [$errors, $date ?? null];
    }
}
