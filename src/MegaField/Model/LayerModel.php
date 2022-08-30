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


class LayerModel implements IModel {
	/**
     * @var string
	 */
	private $layerModelId;
	/**
     * @var string
	 */
	private $areaModelName;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	public function getLayerModelId(): ?string {
		return $this->layerModelId;
	}
	public function setLayerModelId(?string $layerModelId) {
		$this->layerModelId = $layerModelId;
	}
	public function withLayerModelId(?string $layerModelId): LayerModel {
		$this->layerModelId = $layerModelId;
		return $this;
	}
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
	public function withAreaModelName(?string $areaModelName): LayerModel {
		$this->areaModelName = $areaModelName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): LayerModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
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
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "layerModelId" => $this->getLayerModelId(),
            "areaModelName" => $this->getAreaModelName(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
        );
    }
}