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
use Gs2\Money2\Model\AppleAppStoreContent;
use Gs2\Money2\Model\GooglePlayContent;

/**
 * Request for updateStoreContentModelMaster: Update Store Content Master
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#updatestorecontentmodelmaster
 */
class UpdateStoreContentModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Store Content Model name */
    private $contentName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var AppleAppStoreContent Apple App Store Content */
    private $appleAppStore;
    /** @var GooglePlayContent Google Play Content */
    private $googlePlay;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateStoreContentModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateStoreContentModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
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
     * @return UpdateStoreContentModelMasterRequest
     */
	public function withContentName(?string $contentName): UpdateStoreContentModelMasterRequest {
		$this->contentName = $contentName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateStoreContentModelMasterRequest
     */
	public function withDescription(?string $description): UpdateStoreContentModelMasterRequest {
		$this->description = $description;
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
     * @return UpdateStoreContentModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateStoreContentModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return AppleAppStoreContent|null Apple App Store Content */
	public function getAppleAppStore(): ?AppleAppStoreContent {
		return $this->appleAppStore;
	}
    /** @param AppleAppStoreContent|null $appleAppStore Apple App Store Content */
	public function setAppleAppStore(?AppleAppStoreContent $appleAppStore) {
		$this->appleAppStore = $appleAppStore;
	}
    /**
     * @param AppleAppStoreContent|null $appleAppStore Apple App Store Content
     * @return UpdateStoreContentModelMasterRequest
     */
	public function withAppleAppStore(?AppleAppStoreContent $appleAppStore): UpdateStoreContentModelMasterRequest {
		$this->appleAppStore = $appleAppStore;
		return $this;
	}
    /** @return GooglePlayContent|null Google Play Content */
	public function getGooglePlay(): ?GooglePlayContent {
		return $this->googlePlay;
	}
    /** @param GooglePlayContent|null $googlePlay Google Play Content */
	public function setGooglePlay(?GooglePlayContent $googlePlay) {
		$this->googlePlay = $googlePlay;
	}
    /**
     * @param GooglePlayContent|null $googlePlay Google Play Content
     * @return UpdateStoreContentModelMasterRequest
     */
	public function withGooglePlay(?GooglePlayContent $googlePlay): UpdateStoreContentModelMasterRequest {
		$this->googlePlay = $googlePlay;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateStoreContentModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateStoreContentModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withContentName(array_key_exists('contentName', $data) && $data['contentName'] !== null ? $data['contentName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withAppleAppStore(array_key_exists('appleAppStore', $data) && $data['appleAppStore'] !== null ? AppleAppStoreContent::fromJson($data['appleAppStore']) : null)
            ->withGooglePlay(array_key_exists('googlePlay', $data) && $data['googlePlay'] !== null ? GooglePlayContent::fromJson($data['googlePlay']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "contentName" => $this->getContentName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "appleAppStore" => $this->getAppleAppStore() !== null ? $this->getAppleAppStore()->toJson() : null,
            "googlePlay" => $this->getGooglePlay() !== null ? $this->getGooglePlay()->toJson() : null,
        );
    }
}