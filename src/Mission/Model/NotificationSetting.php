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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;


/**
 * Push Notification Setting
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#notificationsetting
 */
class NotificationSetting implements IModel {
	/**
     * @var string GS2-Gateway Namespace to use for push notifications
	 */
	private $gatewayNamespaceId;
	/**
     * @var bool Whether to forward the notification as a mobile push notification
	 */
	private $enableTransferMobileNotification;
	/**
     * @var string Sound file name to be used for mobile push notifications
	 */
	private $sound;
	/**
     * @var array Localized title and body used when forwarding to mobile push notifications
	 */
	private $mobileNotificationMessages;
	/**
     * @var string Whether to enable push notifications
	 */
	private $enable;
    /** @return string|null GS2-Gateway Namespace to use for push notifications */
	public function getGatewayNamespaceId(): ?string {
		return $this->gatewayNamespaceId;
	}
    /** @param string|null $gatewayNamespaceId GS2-Gateway Namespace to use for push notifications */
	public function setGatewayNamespaceId(?string $gatewayNamespaceId) {
		$this->gatewayNamespaceId = $gatewayNamespaceId;
	}
    /**
     * @param string|null $gatewayNamespaceId GS2-Gateway Namespace to use for push notifications
     * @return NotificationSetting
     */
	public function withGatewayNamespaceId(?string $gatewayNamespaceId): NotificationSetting {
		$this->gatewayNamespaceId = $gatewayNamespaceId;
		return $this;
	}
    /** @return bool|null Whether to forward the notification as a mobile push notification */
	public function getEnableTransferMobileNotification(): ?bool {
		return $this->enableTransferMobileNotification;
	}
    /** @param bool|null $enableTransferMobileNotification Whether to forward the notification as a mobile push notification */
	public function setEnableTransferMobileNotification(?bool $enableTransferMobileNotification) {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
	}
    /**
     * @param bool|null $enableTransferMobileNotification Whether to forward the notification as a mobile push notification
     * @return NotificationSetting
     */
	public function withEnableTransferMobileNotification(?bool $enableTransferMobileNotification): NotificationSetting {
		$this->enableTransferMobileNotification = $enableTransferMobileNotification;
		return $this;
	}
    /** @return string|null Sound file name to be used for mobile push notifications */
	public function getSound(): ?string {
		return $this->sound;
	}
    /** @param string|null $sound Sound file name to be used for mobile push notifications */
	public function setSound(?string $sound) {
		$this->sound = $sound;
	}
    /**
     * @param string|null $sound Sound file name to be used for mobile push notifications
     * @return NotificationSetting
     */
	public function withSound(?string $sound): NotificationSetting {
		$this->sound = $sound;
		return $this;
	}
    /** @return array|null Localized title and body used when forwarding to mobile push notifications */
	public function getMobileNotificationMessages(): ?array {
		return $this->mobileNotificationMessages;
	}
    /** @param array|null $mobileNotificationMessages Localized title and body used when forwarding to mobile push notifications */
	public function setMobileNotificationMessages(?array $mobileNotificationMessages) {
		$this->mobileNotificationMessages = $mobileNotificationMessages;
	}
    /**
     * @param array|null $mobileNotificationMessages Localized title and body used when forwarding to mobile push notifications
     * @return NotificationSetting
     */
	public function withMobileNotificationMessages(?array $mobileNotificationMessages): NotificationSetting {
		$this->mobileNotificationMessages = $mobileNotificationMessages;
		return $this;
	}
    /** @return string|null Whether to enable push notifications */
	public function getEnable(): ?string {
		return $this->enable;
	}
    /** @param string|null $enable Whether to enable push notifications */
	public function setEnable(?string $enable) {
		$this->enable = $enable;
	}
    /**
     * @param string|null $enable Whether to enable push notifications
     * @return NotificationSetting
     */
	public function withEnable(?string $enable): NotificationSetting {
		$this->enable = $enable;
		return $this;
	}

    public static function fromJson(?array $data): ?NotificationSetting {
        if ($data === null) {
            return null;
        }
        return (new NotificationSetting())
            ->withGatewayNamespaceId(array_key_exists('gatewayNamespaceId', $data) && $data['gatewayNamespaceId'] !== null ? $data['gatewayNamespaceId'] : null)
            ->withEnableTransferMobileNotification(array_key_exists('enableTransferMobileNotification', $data) ? $data['enableTransferMobileNotification'] : null)
            ->withSound(array_key_exists('sound', $data) && $data['sound'] !== null ? $data['sound'] : null)
            ->withMobileNotificationMessages(!array_key_exists('mobileNotificationMessages', $data) || $data['mobileNotificationMessages'] === null ? null : array_map(
                function ($item) {
                    return MobileNotificationMessage::fromJson($item);
                },
                $data['mobileNotificationMessages']
            ))
            ->withEnable(array_key_exists('enable', $data) && $data['enable'] !== null ? $data['enable'] : null);
    }

    public function toJson(): array {
        return array(
            "gatewayNamespaceId" => $this->getGatewayNamespaceId(),
            "enableTransferMobileNotification" => $this->getEnableTransferMobileNotification(),
            "sound" => $this->getSound(),
            "mobileNotificationMessages" => $this->getMobileNotificationMessages() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getMobileNotificationMessages()
            ),
            "enable" => $this->getEnable(),
        );
    }
}