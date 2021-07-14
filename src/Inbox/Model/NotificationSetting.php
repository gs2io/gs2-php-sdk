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

namespace Gs2\Inbox\Model;

use Gs2\Core\Model\IModel;


class NotificationSetting implements IModel {
	/**
     * @var string
	 */
	private $gatewayNamespaceId;
	/**
     * @var bool
	 */
	private $enableTransferMobileNotification;
	/**
     * @var string
	 */
	private $sound;

	public function getGatewayNamespaceId(): ?string {
		return $this->gatewayNamespaceId;
	}

	public function setGatewayNamespaceId(?string $gatewayNamespaceId) {
		$this->gatewayNamespaceId = $gatewayNamespaceId;
	}

	public function withGatewayNamespaceId(?string $gatewayNamespaceId): NotificationSetting {
		$this->gatewayNamespaceId = $gatewayNamespaceId;
		return $this;
	}

	public function getEnableTransferMobileNotification(): ?bool {
		return $this->enableTransferMobileNotification;
	}

	public function setEnableTransferMobileNotification(?bool $enableTransferMobileNotification) {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
	}

	public function withEnableTransferMobileNotification(?bool $enableTransferMobileNotification): NotificationSetting {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
		return $this;
	}

	public function getSound(): ?string {
		return $this->sound;
	}

	public function setSound(?string $sound) {
		$this->sound = $sound;
	}

	public function withSound(?string $sound): NotificationSetting {
		$this->sound = $sound;
		return $this;
	}

    public static function fromJson(?array $data): ?NotificationSetting {
        if ($data === null) {
            return null;
        }
        return (new NotificationSetting())
            ->withGatewayNamespaceId(empty($data['gatewayNamespaceId']) ? null : $data['gatewayNamespaceId'])
            ->withEnableTransferMobileNotification(empty($data['enableTransferMobileNotification']) ? null : $data['enableTransferMobileNotification'])
            ->withSound(empty($data['sound']) ? null : $data['sound']);
    }

    public function toJson(): array {
        return array(
            "gatewayNamespaceId" => $this->getGatewayNamespaceId(),
            "enableTransferMobileNotification" => $this->getEnableTransferMobileNotification(),
            "sound" => $this->getSound(),
        );
    }
}