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
 * Spatial
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#spatial
 */
class Spatial implements IModel {
	/**
     * @var string Spatial GRN
	 */
	private $spatialId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Area name
	 */
	private $areaModelName;
	/**
     * @var string Layer name
	 */
	private $layerModelName;
	/**
     * @var Position Position
	 */
	private $position;
	/**
     * @var Vector Vector
	 */
	private $vector;
	/**
     * @var float Radius
	 */
	private $r;
	/**
     * @var int Last Synchronization Date and Time for Layer
	 */
	private $lastSyncAt;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
    /** @return string|null Spatial GRN */
	public function getSpatialId(): ?string {
		return $this->spatialId;
	}
    /** @param string|null $spatialId Spatial GRN */
	public function setSpatialId(?string $spatialId) {
		$this->spatialId = $spatialId;
	}
    /**
     * @param string|null $spatialId Spatial GRN
     * @return Spatial
     */
	public function withSpatialId(?string $spatialId): Spatial {
		$this->spatialId = $spatialId;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return Spatial
     */
	public function withUserId(?string $userId): Spatial {
		$this->userId = $userId;
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
     * @return Spatial
     */
	public function withAreaModelName(?string $areaModelName): Spatial {
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
     * @return Spatial
     */
	public function withLayerModelName(?string $layerModelName): Spatial {
		$this->layerModelName = $layerModelName;
		return $this;
	}
    /** @return Position|null Position */
	public function getPosition(): ?Position {
		return $this->position;
	}
    /** @param Position|null $position Position */
	public function setPosition(?Position $position) {
		$this->position = $position;
	}
    /**
     * @param Position|null $position Position
     * @return Spatial
     */
	public function withPosition(?Position $position): Spatial {
		$this->position = $position;
		return $this;
	}
    /** @return Vector|null Vector */
	public function getVector(): ?Vector {
		return $this->vector;
	}
    /** @param Vector|null $vector Vector */
	public function setVector(?Vector $vector) {
		$this->vector = $vector;
	}
    /**
     * @param Vector|null $vector Vector
     * @return Spatial
     */
	public function withVector(?Vector $vector): Spatial {
		$this->vector = $vector;
		return $this;
	}
    /** @return float|null Radius */
	public function getR(): ?float {
		return $this->r;
	}
    /** @param float|null $r Radius */
	public function setR(?float $r) {
		$this->r = $r;
	}
    /**
     * @param float|null $r Radius
     * @return Spatial
     */
	public function withR(?float $r): Spatial {
		$this->r = $r;
		return $this;
	}
    /** @return int|null Last Synchronization Date and Time for Layer */
	public function getLastSyncAt(): ?int {
		return $this->lastSyncAt;
	}
    /** @param int|null $lastSyncAt Last Synchronization Date and Time for Layer */
	public function setLastSyncAt(?int $lastSyncAt) {
		$this->lastSyncAt = $lastSyncAt;
	}
    /**
     * @param int|null $lastSyncAt Last Synchronization Date and Time for Layer
     * @return Spatial
     */
	public function withLastSyncAt(?int $lastSyncAt): Spatial {
		$this->lastSyncAt = $lastSyncAt;
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
     * @return Spatial
     */
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