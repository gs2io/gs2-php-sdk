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
 * Verify Receipt Event
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#verifyreceiptevent
 */
class VerifyReceiptEvent implements IModel {
	/**
     * @var string Store Content Model name
	 */
	private $contentName;
	/**
     * @var string Store Platform
	 */
	private $platform;
	/**
     * @var AppleAppStoreVerifyReceiptEvent Apple App Store Verify Receipt Event
	 */
	private $appleAppStoreVerifyReceiptEvent;
	/**
     * @var GooglePlayVerifyReceiptEvent Google Play Verify Receipt Event
	 */
	private $googlePlayVerifyReceiptEvent;
    /** @return string|null Store Content Model name */
	public function getContentName(): ?string {
		return $this->contentName;
	}
    /** @param string|null $contentName Store Content Model name */
	public function setContentName(?string $contentName) {
		$this->contentName = $contentName;
	}
    /**
     * @param string|null $contentName Store Content Model name
     * @return VerifyReceiptEvent
     */
	public function withContentName(?string $contentName): VerifyReceiptEvent {
		$this->contentName = $contentName;
		return $this;
	}
    /** @return string|null Store Platform */
	public function getPlatform(): ?string {
		return $this->platform;
	}
    /** @param string|null $platform Store Platform */
	public function setPlatform(?string $platform) {
		$this->platform = $platform;
	}
    /**
     * @param string|null $platform Store Platform
     * @return VerifyReceiptEvent
     */
	public function withPlatform(?string $platform): VerifyReceiptEvent {
		$this->platform = $platform;
		return $this;
	}
    /** @return AppleAppStoreVerifyReceiptEvent|null Apple App Store Verify Receipt Event */
	public function getAppleAppStoreVerifyReceiptEvent(): ?AppleAppStoreVerifyReceiptEvent {
		return $this->appleAppStoreVerifyReceiptEvent;
	}
    /** @param AppleAppStoreVerifyReceiptEvent|null $appleAppStoreVerifyReceiptEvent Apple App Store Verify Receipt Event */
	public function setAppleAppStoreVerifyReceiptEvent(?AppleAppStoreVerifyReceiptEvent $appleAppStoreVerifyReceiptEvent) {
		$this->appleAppStoreVerifyReceiptEvent = $appleAppStoreVerifyReceiptEvent;
	}
    /**
     * @param AppleAppStoreVerifyReceiptEvent|null $appleAppStoreVerifyReceiptEvent Apple App Store Verify Receipt Event
     * @return VerifyReceiptEvent
     */
	public function withAppleAppStoreVerifyReceiptEvent(?AppleAppStoreVerifyReceiptEvent $appleAppStoreVerifyReceiptEvent): VerifyReceiptEvent {
		$this->appleAppStoreVerifyReceiptEvent = $appleAppStoreVerifyReceiptEvent;
		return $this;
	}
    /** @return GooglePlayVerifyReceiptEvent|null Google Play Verify Receipt Event */
	public function getGooglePlayVerifyReceiptEvent(): ?GooglePlayVerifyReceiptEvent {
		return $this->googlePlayVerifyReceiptEvent;
	}
    /** @param GooglePlayVerifyReceiptEvent|null $googlePlayVerifyReceiptEvent Google Play Verify Receipt Event */
	public function setGooglePlayVerifyReceiptEvent(?GooglePlayVerifyReceiptEvent $googlePlayVerifyReceiptEvent) {
		$this->googlePlayVerifyReceiptEvent = $googlePlayVerifyReceiptEvent;
	}
    /**
     * @param GooglePlayVerifyReceiptEvent|null $googlePlayVerifyReceiptEvent Google Play Verify Receipt Event
     * @return VerifyReceiptEvent
     */
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