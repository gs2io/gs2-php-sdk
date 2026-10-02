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

namespace Gs2\Chat\Model;

use Gs2\Core\Model\IModel;


/**
 * Notification Type
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#notificationtype
 */
class NotificationType implements IModel {
	/**
     * @var int Categories for which you receive new message notifications
	 */
	private $category;
	/**
     * @var bool Whether to forward to mobile push notifications when offline
	 */
	private $enableTransferMobilePushNotification;
    /** @return int|null Categories for which you receive new message notifications */
	public function getCategory(): ?int {
		return $this->category;
	}
    /** @param int|null $category Categories for which you receive new message notifications */
	public function setCategory(?int $category) {
		$this->category = $category;
	}
    /**
     * @param int|null $category Categories for which you receive new message notifications
     * @return NotificationType
     */
	public function withCategory(?int $category): NotificationType {
		$this->category = $category;
		return $this;
	}
    /** @return bool|null Whether to forward to mobile push notifications when offline */
	public function getEnableTransferMobilePushNotification(): ?bool {
		return $this->enableTransferMobilePushNotification;
	}
    /** @param bool|null $enableTransferMobilePushNotification Whether to forward to mobile push notifications when offline */
	public function setEnableTransferMobilePushNotification(?bool $enableTransferMobilePushNotification) {
		$this->enableTransferMobilePushNotification = $enableTransferMobilePushNotification;
	}
    /**
     * @param bool|null $enableTransferMobilePushNotification Whether to forward to mobile push notifications when offline
     * @return NotificationType
     */
	public function withEnableTransferMobilePushNotification(?bool $enableTransferMobilePushNotification): NotificationType {
		$this->enableTransferMobilePushNotification = $enableTransferMobilePushNotification;
		return $this;
	}

    public static function fromJson(?array $data): ?NotificationType {
        if ($data === null) {
            return null;
        }
        return (new NotificationType())
            ->withCategory(array_key_exists('category', $data) && $data['category'] !== null ? $data['category'] : null)
            ->withEnableTransferMobilePushNotification(array_key_exists('enableTransferMobilePushNotification', $data) ? $data['enableTransferMobilePushNotification'] : null);
    }

    public function toJson(): array {
        return array(
            "category" => $this->getCategory(),
            "enableTransferMobilePushNotification" => $this->getEnableTransferMobilePushNotification(),
        );
    }
}