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


class StoreSubscriptionContentModelMaster implements IModel {
	/**
     * @var string
	 */
	private $storeSubscriptionContentModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $scheduleNamespaceId;
	/**
     * @var string
	 */
	private $triggerName;
	/**
     * @var int
	 */
	private $reallocateSpanDays;
	/**
     * @var string
	 */
	private $triggerExtendMode;
	/**
     * @var int
	 */
	private $rollupHour;
	/**
     * @var AppleAppStoreSubscriptionContent
	 */
	private $appleAppStore;
	/**
     * @var GooglePlaySubscriptionContent
	 */
	private $googlePlay;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getStoreSubscriptionContentModelId(): ?string {
		return $this->storeSubscriptionContentModelId;
	}
	public function setStoreSubscriptionContentModelId(?string $storeSubscriptionContentModelId) {
		$this->storeSubscriptionContentModelId = $storeSubscriptionContentModelId;
	}
	public function withStoreSubscriptionContentModelId(?string $storeSubscriptionContentModelId): StoreSubscriptionContentModelMaster {
		$this->storeSubscriptionContentModelId = $storeSubscriptionContentModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): StoreSubscriptionContentModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): StoreSubscriptionContentModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): StoreSubscriptionContentModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getScheduleNamespaceId(): ?string {
		return $this->scheduleNamespaceId;
	}
	public function setScheduleNamespaceId(?string $scheduleNamespaceId) {
		$this->scheduleNamespaceId = $scheduleNamespaceId;
	}
	public function withScheduleNamespaceId(?string $scheduleNamespaceId): StoreSubscriptionContentModelMaster {
		$this->scheduleNamespaceId = $scheduleNamespaceId;
		return $this;
	}
	public function getTriggerName(): ?string {
		return $this->triggerName;
	}
	public function setTriggerName(?string $triggerName) {
		$this->triggerName = $triggerName;
	}
	public function withTriggerName(?string $triggerName): StoreSubscriptionContentModelMaster {
		$this->triggerName = $triggerName;
		return $this;
	}
	public function getReallocateSpanDays(): ?int {
		return $this->reallocateSpanDays;
	}
	public function setReallocateSpanDays(?int $reallocateSpanDays) {
		$this->reallocateSpanDays = $reallocateSpanDays;
	}
	public function withReallocateSpanDays(?int $reallocateSpanDays): StoreSubscriptionContentModelMaster {
		$this->reallocateSpanDays = $reallocateSpanDays;
		return $this;
	}
	public function getTriggerExtendMode(): ?string {
		return $this->triggerExtendMode;
	}
	public function setTriggerExtendMode(?string $triggerExtendMode) {
		$this->triggerExtendMode = $triggerExtendMode;
	}
	public function withTriggerExtendMode(?string $triggerExtendMode): StoreSubscriptionContentModelMaster {
		$this->triggerExtendMode = $triggerExtendMode;
		return $this;
	}
	public function getRollupHour(): ?int {
		return $this->rollupHour;
	}
	public function setRollupHour(?int $rollupHour) {
		$this->rollupHour = $rollupHour;
	}
	public function withRollupHour(?int $rollupHour): StoreSubscriptionContentModelMaster {
		$this->rollupHour = $rollupHour;
		return $this;
	}
	public function getAppleAppStore(): ?AppleAppStoreSubscriptionContent {
		return $this->appleAppStore;
	}
	public function setAppleAppStore(?AppleAppStoreSubscriptionContent $appleAppStore) {
		$this->appleAppStore = $appleAppStore;
	}
	public function withAppleAppStore(?AppleAppStoreSubscriptionContent $appleAppStore): StoreSubscriptionContentModelMaster {
		$this->appleAppStore = $appleAppStore;
		return $this;
	}
	public function getGooglePlay(): ?GooglePlaySubscriptionContent {
		return $this->googlePlay;
	}
	public function setGooglePlay(?GooglePlaySubscriptionContent $googlePlay) {
		$this->googlePlay = $googlePlay;
	}
	public function withGooglePlay(?GooglePlaySubscriptionContent $googlePlay): StoreSubscriptionContentModelMaster {
		$this->googlePlay = $googlePlay;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): StoreSubscriptionContentModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): StoreSubscriptionContentModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): StoreSubscriptionContentModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?StoreSubscriptionContentModelMaster {
        if ($data === null) {
            return null;
        }
        return (new StoreSubscriptionContentModelMaster())
            ->withStoreSubscriptionContentModelId(array_key_exists('storeSubscriptionContentModelId', $data) && $data['storeSubscriptionContentModelId'] !== null ? $data['storeSubscriptionContentModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withScheduleNamespaceId(array_key_exists('scheduleNamespaceId', $data) && $data['scheduleNamespaceId'] !== null ? $data['scheduleNamespaceId'] : null)
            ->withTriggerName(array_key_exists('triggerName', $data) && $data['triggerName'] !== null ? $data['triggerName'] : null)
            ->withReallocateSpanDays(array_key_exists('reallocateSpanDays', $data) && $data['reallocateSpanDays'] !== null ? $data['reallocateSpanDays'] : null)
            ->withTriggerExtendMode(array_key_exists('triggerExtendMode', $data) && $data['triggerExtendMode'] !== null ? $data['triggerExtendMode'] : null)
            ->withRollupHour(array_key_exists('rollupHour', $data) && $data['rollupHour'] !== null ? $data['rollupHour'] : null)
            ->withAppleAppStore(array_key_exists('appleAppStore', $data) && $data['appleAppStore'] !== null ? AppleAppStoreSubscriptionContent::fromJson($data['appleAppStore']) : null)
            ->withGooglePlay(array_key_exists('googlePlay', $data) && $data['googlePlay'] !== null ? GooglePlaySubscriptionContent::fromJson($data['googlePlay']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "storeSubscriptionContentModelId" => $this->getStoreSubscriptionContentModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "scheduleNamespaceId" => $this->getScheduleNamespaceId(),
            "triggerName" => $this->getTriggerName(),
            "reallocateSpanDays" => $this->getReallocateSpanDays(),
            "triggerExtendMode" => $this->getTriggerExtendMode(),
            "rollupHour" => $this->getRollupHour(),
            "appleAppStore" => $this->getAppleAppStore() !== null ? $this->getAppleAppStore()->toJson() : null,
            "googlePlay" => $this->getGooglePlay() !== null ? $this->getGooglePlay()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}