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


class Spatial implements IModel {
	/**
     * @var string
	 */
	private $spatialId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $areaModelName;
	/**
     * @var string
	 */
	private $layerModelName;
	/**
     * @var Position
	 */
	private $position;
	/**
     * @var Vector
	 */
	private $vector;
	/**
     * @var float
	 */
	private $r;
	/**
     * @var int
	 */
	private $lastSyncAt;
	/**
     * @var int
	 */
	private $createdAt;
	public function getSpatialId(): ?string {
		return $this->spatialId;
	}
	public function setSpatialId(?string $spatialId) {
		$this->spatialId = $spatialId;
	}
	public function withSpatialId(?string $spatialId): Spatial {
		$this->spatialId = $spatialId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Spatial {
		$this->userId = $userId;
		return $this;
	}
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
	public function withAreaModelName(?string $areaModelName): Spatial {
		$this->areaModelName = $areaModelName;
		return $this;
	}
	public function getLayerModelName(): ?string {
		return $this->layerModelName;
	}
	public function setLayerModelName(?string $layerModelName) {
		$this->layerModelName = $layerModelName;
	}
	public function withLayerModelName(?string $layerModelName): Spatial {
		$this->layerModelName = $layerModelName;
		return $this;
	}
	public function getPosition(): ?Position {
		return $this->position;
	}
	public function setPosition(?Position $position) {
		$this->position = $position;
	}
	public function withPosition(?Position $position): Spatial {
		$this->position = $position;
		return $this;
	}
	public function getVector(): ?Vector {
		return $this->vector;
	}
	public function setVector(?Vector $vector) {
		$this->vector = $vector;
	}
	public function withVector(?Vector $vector): Spatial {
		$this->vector = $vector;
		return $this;
	}
	public function getR(): ?float {
		return $this->r;
	}
	public function setR(?float $r) {
		$this->r = $r;
	}
	public function withR(?float $r): Spatial {
		$this->r = $r;
		return $this;
	}
	public function getLastSyncAt(): ?int {
		return $this->lastSyncAt;
	}
	public function setLastSyncAt(?int $lastSyncAt) {
		$this->lastSyncAt = $lastSyncAt;
	}
	public function withLastSyncAt(?int $lastSyncAt): Spatial {
		$this->lastSyncAt = $lastSyncAt;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Spatial {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Spatial {
        if ($data === null) {
            return null;
        }
        return (new Spatial())
            ->withSpatialId(array_key_exists('spatialId', $data) && $data['spatialId'] !== null ? $data['spatialId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withLayerModelName(array_key_exists('layerModelName', $data) && $data['layerModelName'] !== null ? $data['layerModelName'] : null)
            ->withPosition(array_key_exists('position', $data) && $data['position'] !== null ? Position::fromJson($data['position']) : null)
            ->withVector(array_key_exists('vector', $data) && $data['vector'] !== null ? Vector::fromJson($data['vector']) : null)
            ->withR(array_key_exists('r', $data) && $data['r'] !== null ? $data['r'] : null)
            ->withLastSyncAt(array_key_exists('lastSyncAt', $data) && $data['lastSyncAt'] !== null ? $data['lastSyncAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "spatialId" => $this->getSpatialId(),
            "userId" => $this->getUserId(),
            "areaModelName" => $this->getAreaModelName(),
            "layerModelName" => $this->getLayerModelName(),
            "position" => $this->getPosition() !== null ? $this->getPosition()->toJson() : null,
            "vector" => $this->getVector() !== null ? $this->getVector()->toJson() : null,
            "r" => $this->getR(),
            "lastSyncAt" => $this->getLastSyncAt(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}