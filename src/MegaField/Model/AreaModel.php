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


class AreaModel implements IModel {
	/**
     * @var string
	 */
	private $areaModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $layerModels;
	public function getAreaModelId(): ?string {
		return $this->areaModelId;
	}
	public function setAreaModelId(?string $areaModelId) {
		$this->areaModelId = $areaModelId;
	}
	public function withAreaModelId(?string $areaModelId): AreaModel {
		$this->areaModelId = $areaModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): AreaModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): AreaModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getLayerModels(): ?array {
		return $this->layerModels;
	}
	public function setLayerModels(?array $layerModels) {
		$this->layerModels = $layerModels;
	}
	public function withLayerModels(?array $layerModels): AreaModel {
		$this->layerModels = $layerModels;
		return $this;
	}

    public static function fromJson(?array $data): ?AreaModel {
        if ($data === null) {
            return null;
        }
        return (new AreaModel())
            ->withAreaModelId(array_key_exists('areaModelId', $data) && $data['areaModelId'] !== null ? $data['areaModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withLayerModels(!array_key_exists('layerModels', $data) || $data['layerModels'] === null ? null : array_map(
                function ($item) {
                    return LayerModel::fromJson($item);
                },
                $data['layerModels']
            ));
    }

    public function toJson(): array {
        return array(
            "areaModelId" => $this->getAreaModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "layerModels" => $this->getLayerModels() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getLayerModels()
            ),
        );
    }
}