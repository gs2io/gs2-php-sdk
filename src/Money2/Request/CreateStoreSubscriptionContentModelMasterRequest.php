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

namespace Gs2\Money2\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Money2\Model\AppleAppStoreSubscriptionContent;
use Gs2\Money2\Model\GooglePlaySubscriptionContent;

class CreateStoreSubscriptionContentModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $scheduleNamespaceId;
    /** @var string */
    private $triggerName;
    /** @var string */
    private $triggerExtendMode;
    /** @var int */
    private $rollupHour;
    /** @var int */
    private $reallocateSpanDays;
    /** @var AppleAppStoreSubscriptionContent */
    private $appleAppStore;
    /** @var GooglePlaySubscriptionContent */
    private $googlePlay;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateStoreSubscriptionContentModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateStoreSubscriptionContentModelMasterRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateStoreSubscriptionContentModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CreateStoreSubscriptionContentModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getScheduleNamespaceId(): ?string {
		return $this->scheduleNamespaceId;
	}
	public function setScheduleNamespaceId(?string $scheduleNamespaceId) {
		$this->scheduleNamespaceId = $scheduleNamespaceId;
	}
	public function withScheduleNamespaceId(?string $scheduleNamespaceId): CreateStoreSubscriptionContentModelMasterRequest {
		$this->scheduleNamespaceId = $scheduleNamespaceId;
		return $this;
	}
	public function getTriggerName(): ?string {
		return $this->triggerName;
	}
	public function setTriggerName(?string $triggerName) {
		$this->triggerName = $triggerName;
	}
	public function withTriggerName(?string $triggerName): CreateStoreSubscriptionContentModelMasterRequest {
		$this->triggerName = $triggerName;
		return $this;
	}
	public function getTriggerExtendMode(): ?string {
		return $this->triggerExtendMode;
	}
	public function setTriggerExtendMode(?string $triggerExtendMode) {
		$this->triggerExtendMode = $triggerExtendMode;
	}
	public function withTriggerExtendMode(?string $triggerExtendMode): CreateStoreSubscriptionContentModelMasterRequest {
		$this->triggerExtendMode = $triggerExtendMode;
		return $this;
	}
	public function getRollupHour(): ?int {
		return $this->rollupHour;
	}
	public function setRollupHour(?int $rollupHour) {
		$this->rollupHour = $rollupHour;
	}
	public function withRollupHour(?int $rollupHour): CreateStoreSubscriptionContentModelMasterRequest {
		$this->rollupHour = $rollupHour;
		return $this;
	}
	public function getReallocateSpanDays(): ?int {
		return $this->reallocateSpanDays;
	}
	public function setReallocateSpanDays(?int $reallocateSpanDays) {
		$this->reallocateSpanDays = $reallocateSpanDays;
	}
	public function withReallocateSpanDays(?int $reallocateSpanDays): CreateStoreSubscriptionContentModelMasterRequest {
		$this->reallocateSpanDays = $reallocateSpanDays;
		return $this;
	}
	public function getAppleAppStore(): ?AppleAppStoreSubscriptionContent {
		return $this->appleAppStore;
	}
	public function setAppleAppStore(?AppleAppStoreSubscriptionContent $appleAppStore) {
		$this->appleAppStore = $appleAppStore;
	}
	public function withAppleAppStore(?AppleAppStoreSubscriptionContent $appleAppStore): CreateStoreSubscriptionContentModelMasterRequest {
		$this->appleAppStore = $appleAppStore;
		return $this;
	}
	public function getGooglePlay(): ?GooglePlaySubscriptionContent {
		return $this->googlePlay;
	}
	public function setGooglePlay(?GooglePlaySubscriptionContent $googlePlay) {
		$this->googlePlay = $googlePlay;
	}
	public function withGooglePlay(?GooglePlaySubscriptionContent $googlePlay): CreateStoreSubscriptionContentModelMasterRequest {
		$this->googlePlay = $googlePlay;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateStoreSubscriptionContentModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateStoreSubscriptionContentModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
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
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
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