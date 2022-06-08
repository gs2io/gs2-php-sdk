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


class NotificationType implements IModel {
	/**
     * @var int
	 */
	private $category;
	/**
     * @var bool
	 */
	private $enableTransferMobilePushNotification;
	public function getCategory(): ?int {
		return $this->category;
	}
	public function setCategory(?int $category) {
		$this->category = $category;
	}
	public function withCategory(?int $category): NotificationType {
		$this->category = $category;
		return $this;
	}
	public function getEnableTransferMobilePushNotification(): ?bool {
		return $this->enableTransferMobilePushNotification;
	}
	public function setEnableTransferMobilePushNotification(?bool $enableTransferMobilePushNotification) {
		$this->enableTransferMobilePushNotification = $enableTransferMobilePushNotification;
	}
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