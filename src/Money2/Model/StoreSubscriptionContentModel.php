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
 * Store Subscription Content Model
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#storesubscriptioncontentmodel
 */
class StoreSubscriptionContentModel implements IModel {
	/**
     * @var string Subscription Content Model GRN
	 */
	private $storeSubscriptionContentModelId;
	/**
     * @var string Store Subscription Content Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Namespace GRN of GS2-Schedule to link the subscription period
	 */
	private $scheduleNamespaceId;
	/**
     * @var string Trigger name to reflect the subscription period
	 */
	private $triggerName;
	/**
     * @var string Mode to reflect the subscription period on the trigger
	 */
	private $triggerExtendMode;
	/**
     * @var int Hour of the day to roll up the subscription period (UTC)
	 */
	private $rollupHour;
	/**
     * @var int Time span (days) that allows subscription contract information to be assigned to other users
	 */
	private $reallocateSpanDays;
	/**
     * @var AppleAppStoreSubscriptionContent Apple App Store Content
	 */
	private $appleAppStore;
	/**
     * @var GooglePlaySubscriptionContent Google Play Content
	 */
	private $googlePlay;
    /** @return string|null Subscription Content Model GRN */
	public function getStoreSubscriptionContentModelId(): ?string {
		return $this->storeSubscriptionContentModelId;
	}
    /** @param string|null $storeSubscriptionContentModelId Subscription Content Model GRN */
	public function setStoreSubscriptionContentModelId(?string $storeSubscriptionContentModelId) {
		$this->storeSubscriptionContentModelId = $storeSubscriptionContentModelId;
	}
    /**
     * @param string|null $storeSubscriptionContentModelId Subscription Content Model GRN
     * @return StoreSubscriptionContentModel
     */
	public function withStoreSubscriptionContentModelId(?string $storeSubscriptionContentModelId): StoreSubscriptionContentModel {
		$this->storeSubscriptionContentModelId = $storeSubscriptionContentModelId;
		return $this;
	}
    /** @return string|null Store Subscription Content Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Store Subscription Content Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Store Subscription Content Model name
     * @return StoreSubscriptionContentModel
     */
	public function withName(?string $name): StoreSubscriptionContentModel {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return StoreSubscriptionContentModel
     */
	public function withMetadata(?string $metadata): StoreSubscriptionContentModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Namespace GRN of GS2-Schedule to link the subscription period */
	public function getScheduleNamespaceId(): ?string {
		return $this->scheduleNamespaceId;
	}
    /** @param string|null $scheduleNamespaceId Namespace GRN of GS2-Schedule to link the subscription period */
	public function setScheduleNamespaceId(?string $scheduleNamespaceId) {
		$this->scheduleNamespaceId = $scheduleNamespaceId;
	}
    /**
     * @param string|null $scheduleNamespaceId Namespace GRN of GS2-Schedule to link the subscription period
     * @return StoreSubscriptionContentModel
     */
	public function withScheduleNamespaceId(?string $scheduleNamespaceId): StoreSubscriptionContentModel {
		$this->scheduleNamespaceId = $scheduleNamespaceId;
		return $this;
	}
    /** @return string|null Trigger name to reflect the subscription period */
	public function getTriggerName(): ?string {
		return $this->triggerName;
	}
    /** @param string|null $triggerName Trigger name to reflect the subscription period */
	public function setTriggerName(?string $triggerName) {
		$this->triggerName = $triggerName;
	}
    /**
     * @param string|null $triggerName Trigger name to reflect the subscription period
     * @return StoreSubscriptionContentModel
     */
	public function withTriggerName(?string $triggerName): StoreSubscriptionContentModel {
		$this->triggerName = $triggerName;
		return $this;
	}
    /** @return string|null Mode to reflect the subscription period on the trigger */
	public function getTriggerExtendMode(): ?string {
		return $this->triggerExtendMode;
	}
    /** @param string|null $triggerExtendMode Mode to reflect the subscription period on the trigger */
	public function setTriggerExtendMode(?string $triggerExtendMode) {
		$this->triggerExtendMode = $triggerExtendMode;
	}
    /**
     * @param string|null $triggerExtendMode Mode to reflect the subscription period on the trigger
     * @return StoreSubscriptionContentModel
     */
	public function withTriggerExtendMode(?string $triggerExtendMode): StoreSubscriptionContentModel {
		$this->triggerExtendMode = $triggerExtendMode;
		return $this;
	}
    /** @return int|null Hour of the day to roll up the subscription period (UTC) */
	public function getRollupHour(): ?int {
		return $this->rollupHour;
	}
    /** @param int|null $rollupHour Hour of the day to roll up the subscription period (UTC) */
	public function setRollupHour(?int $rollupHour) {
		$this->rollupHour = $rollupHour;
	}
    /**
     * @param int|null $rollupHour Hour of the day to roll up the subscription period (UTC)
     * @return StoreSubscriptionContentModel
     */
	public function withRollupHour(?int $rollupHour): StoreSubscriptionContentModel {
		$this->rollupHour = $rollupHour;
		return $this;
	}
    /** @return int|null Time span (days) that allows subscription contract information to be assigned to other users */
	public function getReallocateSpanDays(): ?int {
		return $this->reallocateSpanDays;
	}
    /** @param int|null $reallocateSpanDays Time span (days) that allows subscription contract information to be assigned to other users */
	public function setReallocateSpanDays(?int $reallocateSpanDays) {
		$this->reallocateSpanDays = $reallocateSpanDays;
	}
    /**
     * @param int|null $reallocateSpanDays Time span (days) that allows subscription contract information to be assigned to other users
     * @return StoreSubscriptionContentModel
     */
	public function withReallocateSpanDays(?int $reallocateSpanDays): StoreSubscriptionContentModel {
		$this->reallocateSpanDays = $reallocateSpanDays;
		return $this;
	}
    /** @return AppleAppStoreSubscriptionContent|null Apple App Store Content */
	public function getAppleAppStore(): ?AppleAppStoreSubscriptionContent {
		return $this->appleAppStore;
	}
    /** @param AppleAppStoreSubscriptionContent|null $appleAppStore Apple App Store Content */
	public function setAppleAppStore(?AppleAppStoreSubscriptionContent $appleAppStore) {
		$this->appleAppStore = $appleAppStore;
	}
    /**
     * @param AppleAppStoreSubscriptionContent|null $appleAppStore Apple App Store Content
     * @return StoreSubscriptionContentModel
     */
	public function withAppleAppStore(?AppleAppStoreSubscriptionContent $appleAppStore): StoreSubscriptionContentModel {
		$this->appleAppStore = $appleAppStore;
		return $this;
	}
    /** @return GooglePlaySubscriptionContent|null Google Play Content */
	public function getGooglePlay(): ?GooglePlaySubscriptionContent {
		return $this->googlePlay;
	}
    /** @param GooglePlaySubscriptionContent|null $googlePlay Google Play Content */
	public function setGooglePlay(?GooglePlaySubscriptionContent $googlePlay) {
		$this->googlePlay = $googlePlay;
	}
    /**
     * @param GooglePlaySubscriptionContent|null $googlePlay Google Play Content
     * @return StoreSubscriptionContentModel
     */
	public function withGooglePlay(?GooglePlaySubscriptionContent $googlePlay): StoreSubscriptionContentModel {
		$this->googlePlay = $googlePlay;
		return $this;
	}

    public static function fromJson(?array $data): ?StoreSubscriptionContentModel {
        if ($data === null) {
            return null;
        }
        return (new StoreSubscriptionContentModel())
            ->withStoreSubscriptionContentModelId(array_key_exists('storeSubscriptionContentModelId', $data) && $data['storeSubscriptionContentModelId'] !== null ? $data['storeSubscriptionContentModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withScheduleNamespaceId(array_key_exists('scheduleNamespaceId', $data) && $data['scheduleNamespaceId'] !== null ? $data['scheduleNamespaceId'] : null)
            ->withTriggerName(array_key_exists('triggerName', $data) && $data['triggerName'] !== null ? $data['triggerName'] : null)
            ->withTriggerExtendMode(array_key_exists('triggerExtendMode', $data) && $data['triggerExtendMode'] !== null ? $data['triggerExtendMode'] : null)
            ->withRollupHour(array_key_exists('rollupHour', $data) && $data['rollupHour'] !== null ? $data['rollupHour'] : null)
            ->withReallocateSpanDays(array_key_exists('reallocateSpanDays', $data) && $data['reallocateSpanDays'] !== null ? $data['reallocateSpanDays'] : null)
            ->withAppleAppStore(array_key_exists('appleAppStore', $data) && $data['appleAppStore'] !== null ? AppleAppStoreSubscriptionContent::fromJson($data['appleAppStore']) : null)
            ->withGooglePlay(array_key_exists('googlePlay', $data) && $data['googlePlay'] !== null ? GooglePlaySubscriptionContent::fromJson($data['googlePlay']) : null);
    }

    public function toJson(): array {
        return array(
            "storeSubscriptionContentModelId" => $this->getStoreSubscriptionContentModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "scheduleNamespaceId" => $this->getScheduleNamespaceId(),
            "triggerName" => $this->getTriggerName(),
            "triggerExtendMode" => $this->getTriggerExtendMode(),
            "rollupHour" => $this->getRollupHour(),
            "reallocateSpanDays" => $this->getReallocateSpanDays(),
            "appleAppStore" => $this->getAppleAppStore() !== null ? $this->getAppleAppStore()->toJson() : null,
            "googlePlay" => $this->getGooglePlay() !== null ? $this->getGooglePlay()->toJson() : null,
        );
    }
}