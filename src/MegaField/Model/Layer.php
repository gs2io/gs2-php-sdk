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


class Layer implements IModel {
	/**
     * @var string
	 */
	private $layerId;
	/**
     * @var string
	 */
	private $areaModelName;
	/**
     * @var string
	 */
	private $layerModelName;
	/**
     * @var int
	 */
	private $numberOfMinEntries;
	/**
     * @var int
	 */
	private $numberOfMaxEntries;
	/**
     * @var int
	 */
	private $createdAt;
	public function getLayerId(): ?string {
		return $this->layerId;
	}
	public function setLayerId(?string $layerId) {
		$this->layerId = $layerId;
	}
	public function withLayerId(?string $layerId): Layer {
		$this->layerId = $layerId;
		return $this;
	}
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
	public function withAreaModelName(?string $areaModelName): Layer {
		$this->areaModelName = $areaModelName;
		return $this;
	}
	public function getLayerModelName(): ?string {
		return $this->layerModelName;
	}
	public function setLayerModelName(?string $layerModelName) {
		$this->layerModelName = $layerModelName;
	}
	public function withLayerModelName(?string $layerModelName): Layer {
		$this->layerModelName = $layerModelName;
		return $this;
	}
	public function getNumberOfMinEntries(): ?int {
		return $this->numberOfMinEntries;
	}
	public function setNumberOfMinEntries(?int $numberOfMinEntries) {
		$this->numberOfMinEntries = $numberOfMinEntries;
	}
	public function withNumberOfMinEntries(?int $numberOfMinEntries): Layer {
		$this->numberOfMinEntries = $numberOfMinEntries;
		return $this;
	}
	public function getNumberOfMaxEntries(): ?int {
		return $this->numberOfMaxEntries;
	}
	public function setNumberOfMaxEntries(?int $numberOfMaxEntries) {
		$this->numberOfMaxEntries = $numberOfMaxEntries;
	}
	public function withNumberOfMaxEntries(?int $numberOfMaxEntries): Layer {
		$this->numberOfMaxEntries = $numberOfMaxEntries;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
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