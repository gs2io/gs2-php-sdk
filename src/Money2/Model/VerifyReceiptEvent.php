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


class VerifyReceiptEvent implements IModel {
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
	private $appleAppStoreVerifyReceiptEvent;
	/**
     * @var GooglePlayVerifyReceiptEvent
	 */
	private $googlePlayVerifyReceiptEvent;
	public function getContentName(): ?string {
		return $this->contentName;
	}
	public function setContentName(?string $contentName) {
		$this->contentName = $contentName;
	}
	public function withContentName(?string $contentName): VerifyReceiptEvent {
		$this->contentName = $contentName;
		return $this;
	}
	public function getPlatform(): ?string {
		return $this->platform;
	}
	public function setPlatform(?string $platform) {
		$this->platform = $platform;
	}
	public function withPlatform(?string $platform): VerifyReceiptEvent {
		$this->platform = $platform;
		return $this;
	}
	public function getAppleAppStoreVerifyReceiptEvent(): ?AppleAppStoreVerifyReceiptEvent {
		return $this->appleAppStoreVerifyReceiptEvent;
	}
	public function setAppleAppStoreVerifyReceiptEvent(?AppleAppStoreVerifyReceiptEvent $appleAppStoreVerifyReceiptEvent) {
		$this->appleAppStoreVerifyReceiptEvent = $appleAppStoreVerifyReceiptEvent;
	}
	public function withAppleAppStoreVerifyReceiptEvent(?AppleAppStoreVerifyReceiptEvent $appleAppStoreVerifyReceiptEvent): VerifyReceiptEvent {
		$this->appleAppStoreVerifyReceiptEvent = $appleAppStoreVerifyReceiptEvent;
		return $this;
	}
	public function getGooglePlayVerifyReceiptEvent(): ?GooglePlayVerifyReceiptEvent {
		return $this->googlePlayVerifyReceiptEvent;
	}
	public function setGooglePlayVerifyReceiptEvent(?GooglePlayVerifyReceiptEvent $googlePlayVerifyReceiptEvent) {
		$this->googlePlayVerifyReceiptEvent = $googlePlayVerifyReceiptEvent;
	}
	public function withGooglePlayVerifyReceiptEvent(?GooglePlayVerifyReceiptEvent $googlePlayVerifyReceiptEvent): VerifyReceiptEvent {
		$this->googlePlayVerifyReceiptEvent = $googlePlayVerifyReceiptEvent;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyReceiptEvent {
        if ($data === null) {
            return null;
        }
        return (new VerifyReceiptEvent())
            ->withContentName(array_key_exists('contentName', $data) && $data['contentName'] !== null ? $data['contentName'] : null)
            ->withPlatform(array_key_exists('platform', $data) && $data['platform'] !== null ? $data['platform'] : null)
            ->withAppleAppStoreVerifyReceiptEvent(array_key_exists('appleAppStoreVerifyReceiptEvent', $data) && $data['appleAppStoreVerifyReceiptEvent'] !== null ? AppleAppStoreVerifyReceiptEvent::fromJson($data['appleAppStoreVerifyReceiptEvent']) : null)
            ->withGooglePlayVerifyReceiptEvent(array_key_exists('googlePlayVerifyReceiptEvent', $data) && $data['googlePlayVerifyReceiptEvent'] !== null ? GooglePlayVerifyReceiptEvent::fromJson($data['googlePlayVerifyReceiptEvent']) : null);
    }

    public function toJson(): array {
        return array(
            "contentName" => $this->getContentName(),
            "platform" => $this->getPlatform(),
            "appleAppStoreVerifyReceiptEvent" => $this->getAppleAppStoreVerifyReceiptEvent() !== null ? $this->getAppleAppStoreVerifyReceiptEvent()->toJson() : null,
            "googlePlayVerifyReceiptEvent" => $this->getGooglePlayVerifyReceiptEvent() !== null ? $this->getGooglePlayVerifyReceiptEvent()->toJson() : null,
        );
    }
}