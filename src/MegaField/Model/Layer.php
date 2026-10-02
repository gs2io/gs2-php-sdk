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
 * Layer
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#layer
 */
class Layer implements IModel {
	/**
     * @var string Layer GRN
	 */
	private $layerId;
	/**
     * @var string Area name
	 */
	private $areaModelName;
	/**
     * @var string Layer name
	 */
	private $layerModelName;
	/**
     * @var int Attempts to join with other nodes when the number of entities in a node falls below a specified value
	 */
	private $numberOfMinEntries;
	/**
     * @var int Attempts to split a node if the number of entities in the node exceeds the specified value
	 */
	private $numberOfMaxEntries;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
    /** @return string|null Layer GRN */
	public function getLayerId(): ?string {
		return $this->layerId;
	}
    /** @param string|null $layerId Layer GRN */
	public function setLayerId(?string $layerId) {
		$this->layerId = $layerId;
	}
    /**
     * @param string|null $layerId Layer GRN
     * @return Layer
     */
	public function withLayerId(?string $layerId): Layer {
		$this->layerId = $layerId;
		return $this;
	}
    /** @return string|null Area name */
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
    /** @param string|null $areaModelName Area name */
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
    /**
     * @param string|null $areaModelName Area name
     * @return Layer
     */
	public function withAreaModelName(?string $areaModelName): Layer {
		$this->areaModelName = $areaModelName;
		return $this;
	}
    /** @return string|null Layer name */
	public function getLayerModelName(): ?string {
		return $this->layerModelName;
	}
    /** @param string|null $layerModelName Layer name */
	public function setLayerModelName(?string $layerModelName) {
		$this->layerModelName = $layerModelName;
	}
    /**
     * @param string|null $layerModelName Layer name
     * @return Layer
     */
	public function withLayerModelName(?string $layerModelName): Layer {
		$this->layerModelName = $layerModelName;
		return $this;
	}
    /** @return int|null Attempts to join with other nodes when the number of entities in a node falls below a specified value */
	public function getNumberOfMinEntries(): ?int {
		return $this->numberOfMinEntries;
	}
    /** @param int|null $numberOfMinEntries Attempts to join with other nodes when the number of entities in a node falls below a specified value */
	public function setNumberOfMinEntries(?int $numberOfMinEntries) {
		$this->numberOfMinEntries = $numberOfMinEntries;
	}
    /**
     * @param int|null $numberOfMinEntries Attempts to join with other nodes when the number of entities in a node falls below a specified value
     * @return Layer
     */
	public function withNumberOfMinEntries(?int $numberOfMinEntries): Layer {
		$this->numberOfMinEntries = $numberOfMinEntries;
		return $this;
	}
    /** @return int|null Attempts to split a node if the number of entities in the node exceeds the specified value */
	public function getNumberOfMaxEntries(): ?int {
		return $this->numberOfMaxEntries;
	}
    /** @param int|null $numberOfMaxEntries Attempts to split a node if the number of entities in the node exceeds the specified value */
	public function setNumberOfMaxEntries(?int $numberOfMaxEntries) {
		$this->numberOfMaxEntries = $numberOfMaxEntries;
	}
    /**
     * @param int|null $numberOfMaxEntries Attempts to split a node if the number of entities in the node exceeds the specified value
     * @return Layer
     */
	public function withNumberOfMaxEntries(?int $numberOfMaxEntries): Layer {
		$this->numberOfMaxEntries = $numberOfMaxEntries;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Layer
     */
	public function withCreatedAt(?int $createdAt): Layer {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Layer {
        if ($data === null) {
            return null;
        }
        return (new Layer())
            ->withLayerId(array_key_exists('layerId', $data) && $data['layerId'] !== null ? $data['layerId'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withLayerModelName(array_key_exists('layerModelName', $data) && $data['layerModelName'] !== null ? $data['layerModelName'] : null)
            ->withNumberOfMinEntries(array_key_exists('numberOfMinEntries', $data) && $data['numberOfMinEntries'] !== null ? $data['numberOfMinEntries'] : null)
            ->withNumberOfMaxEntries(array_key_exists('numberOfMaxEntries', $data) && $data['numberOfMaxEntries'] !== null ? $data['numberOfMaxEntries'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "layerId" => $this->getLayerId(),
            "areaModelName" => $this->getAreaModelName(),
            "layerModelName" => $this->getLayerModelName(),
            "numberOfMinEntries" => $this->getNumberOfMinEntries(),
            "numberOfMaxEntries" => $this->getNumberOfMaxEntries(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}