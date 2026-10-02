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

namespace Gs2\MegaField\Model;

use Gs2\Core\Model\IModel;


/**
 * Layers allow for multiple logical hierarchies within a single space.
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#layermodel
 */
class LayerModel implements IModel {
	/**
     * @var string Layer Model GRN
	 */
	private $layerModelId;
	/**
     * @var string Layer Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
    /** @return string|null Layer Model GRN */
	public function getLayerModelId(): ?string {
		return $this->layerModelId;
	}
    /** @param string|null $layerModelId Layer Model GRN */
	public function setLayerModelId(?string $layerModelId) {
		$this->layerModelId = $layerModelId;
	}
    /**
     * @param string|null $layerModelId Layer Model GRN
     * @return LayerModel
     */
	public function withLayerModelId(?string $layerModelId): LayerModel {
		$this->layerModelId = $layerModelId;
		return $this;
	}
    /** @return string|null Layer Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Layer Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Layer Model name
     * @return LayerModel
     */
	public function withName(?string $name): LayerModel {
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
     * @return LayerModel
     */
	public function withMetadata(?string $metadata): LayerModel {
		$this->metadata = $metadata;
		return $this;
	}

    public static function fromJson(?array $data): ?LayerModel {
        if ($data === null) {
            return null;
        }
        return (new LayerModel())
            ->withLayerModelId(array_key_exists('layerModelId', $data) && $data['layerModelId'] !== null ? $data['layerModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "layerModelId" => $this->getLayerModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
        );
    }
}