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

namespace Gs2\AdReward\Model;

use Gs2\Core\Model\IModel;


/**
 * Points earned from ad viewing
 *
 * @see https://docs.gs2.io/api_reference/ad_reward/sdk/#point
 */
class Point implements IModel {
	/**
     * @var string Point GRN
	 */
	private $pointId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Current point balance
	 */
	private $point;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Point GRN */
	public function getPointId(): ?string {
		return $this->pointId;
	}
    /** @param string|null $pointId Point GRN */
	public function setPointId(?string $pointId) {
		$this->pointId = $pointId;
	}
    /**
     * @param string|null $pointId Point GRN
     * @return Point
     */
	public function withPointId(?string $pointId): Point {
		$this->pointId = $pointId;
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
     * @return Point
     */
	public function withUserId(?string $userId): Point {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Current point balance */
	public function getPoint(): ?int {
		return $this->point;
	}
    /** @param int|null $point Current point balance */
	public function setPoint(?int $point) {
		$this->point = $point;
	}
    /**
     * @param int|null $point Current point balance
     * @return Point
     */
	public function withPoint(?int $point): Point {
		$this->point = $point;
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
     * @return Point
     */
	public function withCreatedAt(?int $createdAt): Point {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Point
     */
	public function withUpdatedAt(?int $updatedAt): Point {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Point
     */
	public function withRevision(?int $revision): Point {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Point {
        if ($data === null) {
            return null;
        }
        return (new Point())
            ->withPointId(array_key_exists('pointId', $data) && $data['pointId'] !== null ? $data['pointId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPoint(array_key_exists('point', $data) && $data['point'] !== null ? $data['point'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "pointId" => $this->getPointId(),
            "userId" => $this->getUserId(),
            "point" => $this->getPoint(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}