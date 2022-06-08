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

namespace Gs2\Lottery\Model;

use Gs2\Core\Model\IModel;


class Box implements IModel {
	/**
     * @var string
	 */
	private $boxId;
	/**
     * @var string
	 */
	private $prizeTableName;
	/**
     * @var int
	 */
	private $index;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $drawnIndexes;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getBoxId(): ?string {
		return $this->boxId;
	}
	public function setBoxId(?string $boxId) {
		$this->boxId = $boxId;
	}
	public function withBoxId(?string $boxId): Box {
		$this->boxId = $boxId;
		return $this;
	}
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
	public function withPrizeTableName(?string $prizeTableName): Box {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
	public function getIndex(): ?int {
		return $this->index;
	}
	public function setIndex(?int $index) {
		$this->index = $index;
	}
	public function withIndex(?int $index): Box {
		$this->index = $index;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Box {
		$this->userId = $userId;
		return $this;
	}
	public function getDrawnIndexes(): ?array {
		return $this->drawnIndexes;
	}
	public function setDrawnIndexes(?array $drawnIndexes) {
		$this->drawnIndexes = $drawnIndexes;
	}
	public function withDrawnIndexes(?array $drawnIndexes): Box {
		$this->drawnIndexes = $drawnIndexes;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Box {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Box {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Box {
        if ($data === null) {
            return null;
        }
        return (new Box())
            ->withBoxId(array_key_exists('boxId', $data) && $data['boxId'] !== null ? $data['boxId'] : null)
            ->withPrizeTableName(array_key_exists('prizeTableName', $data) && $data['prizeTableName'] !== null ? $data['prizeTableName'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDrawnIndexes(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('drawnIndexes', $data) && $data['drawnIndexes'] !== null ? $data['drawnIndexes'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "boxId" => $this->getBoxId(),
            "prizeTableName" => $this->getPrizeTableName(),
            "index" => $this->getIndex(),
            "userId" => $this->getUserId(),
            "drawnIndexes" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getDrawnIndexes() !== null && $this->getDrawnIndexes() !== null ? $this->getDrawnIndexes() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}