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


class RefundEvent implements IModel {
	/**
     * @var string
	 */
	private $contentName;
	/**
     * @var string
	 */
	private $platform;
	/**
     * @var AppleAppStoreVerifyReceiptEvent
	 */
	private $appleAppStoreRefundEvent;
	/**
     * @var GooglePlayVerifyReceiptEvent
	 */
	private $googlePlayRefundEvent;
	public function getContentName(): ?string {
		return $this->contentName;
	}
	public function setContentName(?string $contentName) {
		$this->contentName = $contentName;
	}
	public function withContentName(?string $contentName): RefundEvent {
		$this->contentName = $contentName;
		return $this;
	}
	public function getPlatform(): ?string {
		return $this->platform;
	}
	public function setPlatform(?string $platform) {
		$this->platform = $platform;
	}
	public function withPlatform(?string $platform): RefundEvent {
		$this->platform = $platform;
		return $this;
	}
	public function getAppleAppStoreRefundEvent(): ?AppleAppStoreVerifyReceiptEvent {
		return $this->appleAppStoreRefundEvent;
	}
	public function setAppleAppStoreRefundEvent(?AppleAppStoreVerifyReceiptEvent $appleAppStoreRefundEvent) {
		$this->appleAppStoreRefundEvent = $appleAppStoreRefundEvent;
	}
	public function withAppleAppStoreRefundEvent(?AppleAppStoreVerifyReceiptEvent $appleAppStoreRefundEvent): RefundEvent {
		$this->appleAppStoreRefundEvent = $appleAppStoreRefundEvent;
		return $this;
	}
	public function getGooglePlayRefundEvent(): ?GooglePlayVerifyReceiptEvent {
		return $this->googlePlayRefundEvent;
	}
	public function setGooglePlayRefundEvent(?GooglePlayVerifyReceiptEvent $googlePlayRefundEvent) {
		$this->googlePlayRefundEvent = $googlePlayRefundEvent;
	}
	public function withGooglePlayRefundEvent(?GooglePlayVerifyReceiptEvent $googlePlayRefundEvent): RefundEvent {
		$this->googlePlayRefundEvent = $googlePlayRefundEvent;
		return $this;
	}

    public static function fromJson(?array $data): ?RefundEvent {
        if ($data === null) {
            return null;
        }
        return (new RefundEvent())
            ->withContentName(array_key_exists('contentName', $data) && $data['contentName'] !== null ? $data['contentName'] : null)
            ->withPlatform(array_key_exists('platform', $data) && $data['platform'] !== null ? $data['platform'] : null)
            ->withAppleAppStoreRefundEvent(array_key_exists('appleAppStoreRefundEvent', $data) && $data['appleAppStoreRefundEvent'] !== null ? AppleAppStoreVerifyReceiptEvent::fromJson($data['appleAppStoreRefundEvent']) : null)
            ->withGooglePlayRefundEvent(array_key_exists('googlePlayRefundEvent', $data) && $data['googlePlayRefundEvent'] !== null ? GooglePlayVerifyReceiptEvent::fromJson($data['googlePlayRefundEvent']) : null);
    }

    public function toJson(): array {
        return array(
            "contentName" => $this->getContentName(),
            "platform" => $this->getPlatform(),
            "appleAppStoreRefundEvent" => $this->getAppleAppStoreRefundEvent() !== null ? $this->getAppleAppStoreRefundEvent()->toJson() : null,
            "googlePlayRefundEvent" => $this->getGooglePlayRefundEvent() !== null ? $this->getGooglePlayRefundEvent()->toJson() : null,
        );
    }
}