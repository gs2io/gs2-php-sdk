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

namespace Gs2\SerialKey\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for createCampaignModelMaster: Create Campaign Model Master Data
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#createcampaignmodelmaster
 */
class CreateCampaignModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Campaign Model name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var bool Whether to allow redemption with campaign code */
    private $enableCampaignCode;
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
     * @return CreateCampaignModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateCampaignModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Campaign Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Campaign Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Campaign Model name
     * @return CreateCampaignModelMasterRequest
     */
	public function withName(?string $name): CreateCampaignModelMasterRequest {
		$this->name = $name;
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
     * @return CreateCampaignModelMasterRequest
     */
	public function withDescription(?string $description): CreateCampaignModelMasterRequest {
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
     * @return CreateCampaignModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateCampaignModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return bool|null Whether to allow redemption with campaign code */
	public function getEnableCampaignCode(): ?bool {
		return $this->enableCampaignCode;
	}
    /** @param bool|null $enableCampaignCode Whether to allow redemption with campaign code */
	public function setEnableCampaignCode(?bool $enableCampaignCode) {
		$this->enableCampaignCode = $enableCampaignCode;
	}
    /**
     * @param bool|null $enableCampaignCode Whether to allow redemption with campaign code
     * @return CreateCampaignModelMasterRequest
     */
	public function withEnableCampaignCode(?bool $enableCampaignCode): CreateCampaignModelMasterRequest {
		$this->enableCampaignCode = $enableCampaignCode;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateCampaignModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateCampaignModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withEnableCampaignCode(array_key_exists('enableCampaignCode', $data) ? $data['enableCampaignCode'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "enableCampaignCode" => $this->getEnableCampaignCode(),
        );
    }
}