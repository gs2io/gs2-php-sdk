<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


/**
 * Localized message for mobile push notification
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#mobilenotificationmessage
 */
class MobileNotificationMessage implements IModel {
	/**
     * @var string Language of the message
	 */
	private $locale;
	/**
     * @var string Title of the push notification
	 */
	private $title;
	/**
     * @var string Body text of the push notification
	 */
	private $message;
    /** @return string|null Language of the message */
	public function getLocale(): ?string {
		return $this->locale;
	}
    /** @param string|null $locale Language of the message */
	public function setLocale(?string $locale) {
		$this->locale = $locale;
	}
    /**
     * @param string|null $locale Language of the message
     * @return MobileNotificationMessage
     */
	public function withLocale(?string $locale): MobileNotificationMessage {
		$this->locale = $locale;
		return $this;
	}
    /** @return string|null Title of the push notification */
	public function getTitle(): ?string {
		return $this->title;
	}
    /** @param string|null $title Title of the push notification */
	public function setTitle(?string $title) {
		$this->title = $title;
	}
    /**
     * @param string|null $title Title of the push notification
     * @return MobileNotificationMessage
     */
	public function withTitle(?string $title): MobileNotificationMessage {
		$this->title = $title;
		return $this;
	}
    /** @return string|null Body text of the push notification */
	public function getMessage(): ?string {
		return $this->message;
	}
    /** @param string|null $message Body text of the push notification */
	public function setMessage(?string $message) {
		$this->message = $message;
	}
    /**
     * @param string|null $message Body text of the push notification
     * @return MobileNotificationMessage
     */
	public function withMessage(?string $message): MobileNotificationMessage {
		$this->message = $message;
		return $this;
	}

    public static function fromJson(?array $data): ?MobileNotificationMessage {
        if ($data === null) {
            return null;
        }
        return (new MobileNotificationMessage())
            ->withLocale(array_key_exists('locale', $data) && $data['locale'] !== null ? $data['locale'] : null)
            ->withTitle(array_key_exists('title', $data) && $data['title'] !== null ? $data['title'] : null)
            ->withMessage(array_key_exists('message', $data) && $data['message'] !== null ? $data['message'] : null);
    }

    public function toJson(): array {
        return array(
            "locale" => $this->getLocale(),
            "title" => $this->getTitle(),
            "message" => $this->getMessage(),
        );
    }
}