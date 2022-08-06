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


class PrizeLimit implements IModel {
	/**
     * @var string
	 */
	private $prizeLimitId;
	/**
     * @var string
	 */
	private $prizeId;
	/**
     * @var int
	 */
	private $drawnCount;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getPrizeLimitId(): ?string {
		return $this->prizeLimitId;
	}
	public function setPrizeLimitId(?string $prizeLimitId) {
		$this->prizeLimitId = $prizeLimitId;
	}
	public function withPrizeLimitId(?string $prizeLimitId): PrizeLimit {
		$this->prizeLimitId = $prizeLimitId;
		return $this;
	}
	public function getPrizeId(): ?string {
		return $this->prizeId;
	}
	public function setPrizeId(?string $prizeId) {
		$this->prizeId = $prizeId;
	}
	public function withPrizeId(?string $prizeId): PrizeLimit {
		$this->prizeId = $prizeId;
		return $this;
	}
	public function getDrawnCount(): ?int {
		return $this->drawnCount;
	}
	public function setDrawnCount(?int $drawnCount) {
		$this->drawnCount = $drawnCount;
	}
	public function withDrawnCount(?int $drawnCount): PrizeLimit {
		$this->drawnCount = $drawnCount;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): PrizeLimit {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): PrizeLimit {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?PrizeLimit {
        if ($data === null) {
            return null;
        }
        return (new PrizeLimit())
            ->withPrizeLimitId(array_key_exists('prizeLimitId', $data) && $data['prizeLimitId'] !== null ? $data['prizeLimitId'] : null)
            ->withPrizeId(array_key_exists('prizeId', $data) && $data['prizeId'] !== null ? $data['prizeId'] : null)
            ->withDrawnCount(array_key_exists('drawnCount', $data) && $data['drawnCount'] !== null ? $data['drawnCount'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "prizeLimitId" => $this->getPrizeLimitId(),
            "prizeId" => $this->getPrizeId(),
            "drawnCount" => $this->getDrawnCount(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}