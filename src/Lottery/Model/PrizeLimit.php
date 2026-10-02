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


/**
 * Prize Limit
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#prizelimit
 */
class PrizeLimit implements IModel {
	/**
     * @var string Prize Limit GRN
	 */
	private $prizeLimitId;
	/**
     * @var string Prize ID
	 */
	private $prizeId;
	/**
     * @var int Drawn Count
	 */
	private $drawnCount;
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
    /** @return string|null Prize Limit GRN */
	public function getPrizeLimitId(): ?string {
		return $this->prizeLimitId;
	}
    /** @param string|null $prizeLimitId Prize Limit GRN */
	public function setPrizeLimitId(?string $prizeLimitId) {
		$this->prizeLimitId = $prizeLimitId;
	}
    /**
     * @param string|null $prizeLimitId Prize Limit GRN
     * @return PrizeLimit
     */
	public function withPrizeLimitId(?string $prizeLimitId): PrizeLimit {
		$this->prizeLimitId = $prizeLimitId;
		return $this;
	}
    /** @return string|null Prize ID */
	public function getPrizeId(): ?string {
		return $this->prizeId;
	}
    /** @param string|null $prizeId Prize ID */
	public function setPrizeId(?string $prizeId) {
		$this->prizeId = $prizeId;
	}
    /**
     * @param string|null $prizeId Prize ID
     * @return PrizeLimit
     */
	public function withPrizeId(?string $prizeId): PrizeLimit {
		$this->prizeId = $prizeId;
		return $this;
	}
    /** @return int|null Drawn Count */
	public function getDrawnCount(): ?int {
		return $this->drawnCount;
	}
    /** @param int|null $drawnCount Drawn Count */
	public function setDrawnCount(?int $drawnCount) {
		$this->drawnCount = $drawnCount;
	}
    /**
     * @param int|null $drawnCount Drawn Count
     * @return PrizeLimit
     */
	public function withDrawnCount(?int $drawnCount): PrizeLimit {
		$this->drawnCount = $drawnCount;
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
     * @return PrizeLimit
     */
	public function withCreatedAt(?int $createdAt): PrizeLimit {
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
     * @return PrizeLimit
     */
	public function withUpdatedAt(?int $updatedAt): PrizeLimit {
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
     * @return PrizeLimit
     */
	public function withRevision(?int $revision): PrizeLimit {
		$this->revision = $revision;
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
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "prizeLimitId" => $this->getPrizeLimitId(),
            "prizeId" => $this->getPrizeId(),
            "drawnCount" => $this->getDrawnCount(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}