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

class UpdateStoreSubscriptionContentModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $contentName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $scheduleNamespaceId;
    /** @var string */
    private $triggerName;
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
	public function withNamespaceName(?string $namespaceName): UpdateStoreSubscriptionContentModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getContentName(): ?string {
		return $this->contentName;
	}
	public function setContentName(?string $contentName) {
		$this->contentName = $contentName;
	}
	public function withContentName(?string $contentName): UpdateStoreSubscriptionContentModelMasterRequest {
		$this->contentName = $contentName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateStoreSubscriptionContentModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UpdateStoreSubscriptionContentModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getScheduleNamespaceId(): ?string {
		return $this->scheduleNamespaceId;
	}
	public function setScheduleNamespaceId(?string $scheduleNamespaceId) {
		$this->scheduleNamespaceId = $scheduleNamespaceId;
	}
	public function withScheduleNamespaceId(?string $scheduleNamespaceId): UpdateStoreSubscriptionContentModelMasterRequest {
		$this->scheduleNamespaceId = $scheduleNamespaceId;
		return $this;
	}
	public function getTriggerName(): ?string {
		return $this->triggerName;
	}
	public function setTriggerName(?string $triggerName) {
		$this->triggerName = $triggerName;
	}
	public function withTriggerName(?string $triggerName): UpdateStoreSubscriptionContentModelMasterRequest {
		$this->triggerName = $triggerName;
		return $this;
	}
	public function getAppleAppStore(): ?AppleAppStoreSubscriptionContent {
		return $this->appleAppStore;
	}
	public function setAppleAppStore(?AppleAppStoreSubscriptionContent $appleAppStore) {
		$this->appleAppStore = $appleAppStore;
	}
	public function withAppleAppStore(?AppleAppStoreSubscriptionContent $appleAppStore): UpdateStoreSubscriptionContentModelMasterRequest {
		$this->appleAppStore = $appleAppStore;
		return $this;
	}
	public function getGooglePlay(): ?GooglePlaySubscriptionContent {
		return $this->googlePlay;
	}
	public function setGooglePlay(?GooglePlaySubscriptionContent $googlePlay) {
		$this->googlePlay = $googlePlay;
	}
	public function withGooglePlay(?GooglePlaySubscriptionContent $googlePlay): UpdateStoreSubscriptionContentModelMasterRequest {
		$this->googlePlay = $googlePlay;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateStoreSubscriptionContentModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateStoreSubscriptionContentModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withContentName(array_key_exists('contentName', $data) && $data['contentName'] !== null ? $data['contentName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withScheduleNamespaceId(array_key_exists('scheduleNamespaceId', $data) && $data['scheduleNamespaceId'] !== null ? $data['scheduleNamespaceId'] : null)
            ->withTriggerName(array_key_exists('triggerName', $data) && $data['triggerName'] !== null ? $data['triggerName'] : null)
            ->withAppleAppStore(array_key_exists('appleAppStore', $data) && $data['appleAppStore'] !== null ? AppleAppStoreSubscriptionContent::fromJson($data['appleAppStore']) : null)
            ->withGooglePlay(array_key_exists('googlePlay', $data) && $data['googlePlay'] !== null ? GooglePlaySubscriptionContent::fromJson($data['googlePlay']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "contentName" => $this->getContentName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "scheduleNamespaceId" => $this->getScheduleNamespaceId(),
            "triggerName" => $this->getTriggerName(),
            "appleAppStore" => $this->getAppleAppStore() !== null ? $this->getAppleAppStore()->toJson() : null,
            "googlePlay" => $this->getGooglePlay() !== null ? $this->getGooglePlay()->toJson() : null,
        );
    }
}