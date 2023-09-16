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


class Point implements IModel {
	/**
     * @var string
	 */
	private $pointId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $point;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getPointId(): ?string {
		return $this->pointId;
	}
	public function setPointId(?string $pointId) {
		$this->pointId = $pointId;
	}
	public function withPointId(?string $pointId): Point {
		$this->pointId = $pointId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Point {
		$this->userId = $userId;
		return $this;
	}
	public function getPoint(): ?int {
		return $this->point;
	}
	public function setPoint(?int $point) {
		$this->point = $point;
	}
	public function withPoint(?int $point): Point {
		$this->point = $point;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Point {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Point {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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