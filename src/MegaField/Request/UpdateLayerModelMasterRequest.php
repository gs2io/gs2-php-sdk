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

namespace Gs2\MegaField\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateLayerModelMaster: Update Layer Model Master
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#updatelayermodelmaster
 */
class UpdateLayerModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Area Model name */
    private $areaModelName;
    /** @var string Layer Model name */
    private $layerModelName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
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
     * @return UpdateLayerModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateLayerModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Area Model name */
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
    /** @param string|null $areaModelName Area Model name */
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
    /**
     * @param string|null $areaModelName Area Model name
     * @return UpdateLayerModelMasterRequest
     */
	public function withAreaModelName(?string $areaModelName): UpdateLayerModelMasterRequest {
		$this->areaModelName = $areaModelName;
		return $this;
	}
    /** @return string|null Layer Model name */
	public function getLayerModelName(): ?string {
		return $this->layerModelName;
	}
    /** @param string|null $layerModelName Layer Model name */
	public function setLayerModelName(?string $layerModelName) {
		$this->layerModelName = $layerModelName;
	}
    /**
     * @param string|null $layerModelName Layer Model name
     * @return UpdateLayerModelMasterRequest
     */
	public function withLayerModelName(?string $layerModelName): UpdateLayerModelMasterRequest {
		$this->layerModelName = $layerModelName;
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
     * @return UpdateLayerModelMasterRequest
     */
	public function withDescription(?string $description): UpdateLayerModelMasterRequest {
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
     * @return UpdateLayerModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateLayerModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateLayerModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateLayerModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withLayerModelName(array_key_exists('layerModelName', $data) && $data['layerModelName'] !== null ? $data['layerModelName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "areaModelName" => $this->getAreaModelName(),
            "layerModelName" => $this->getLayerModelName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
        );
    }
}