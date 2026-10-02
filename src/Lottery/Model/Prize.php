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
 * Prize
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#prize
 */
class Prize implements IModel {
	/**
     * @var string Prize ID
	 */
	private $prizeId;
	/**
     * @var string Prize Type
	 */
	private $type;
	/**
     * @var array List of Acquire Actions
	 */
	private $acquireActions;
	/**
     * @var int Maximum Number of Draws
	 */
	private $drawnLimit;
	/**
     * @var string Limit Failover Prize ID
	 */
	private $limitFailOverPrizeId;
	/**
     * @var string Prize Table Name
	 */
	private $prizeTableName;
	/**
     * @var int Draw Weight
	 */
	private $weight;
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
     * @return Prize
     */
	public function withPrizeId(?string $prizeId): Prize {
		$this->prizeId = $prizeId;
		return $this;
	}
    /** @return string|null Prize Type */
	public function getType(): ?string {
		return $this->type;
	}
    /** @param string|null $type Prize Type */
	public function setType(?string $type) {
		$this->type = $type;
	}
    /**
     * @param string|null $type Prize Type
     * @return Prize
     */
	public function withType(?string $type): Prize {
		$this->type = $type;
		return $this;
	}
    /** @return array|null List of Acquire Actions */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
    /** @param array|null $acquireActions List of Acquire Actions */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
    /**
     * @param array|null $acquireActions List of Acquire Actions
     * @return Prize
     */
	public function withAcquireActions(?array $acquireActions): Prize {
		$this->acquireActions = $acquireActions;
		return $this;
	}
    /** @return int|null Maximum Number of Draws */
	public function getDrawnLimit(): ?int {
		return $this->drawnLimit;
	}
    /** @param int|null $drawnLimit Maximum Number of Draws */
	public function setDrawnLimit(?int $drawnLimit) {
		$this->drawnLimit = $drawnLimit;
	}
    /**
     * @param int|null $drawnLimit Maximum Number of Draws
     * @return Prize
     */
	public function withDrawnLimit(?int $drawnLimit): Prize {
		$this->drawnLimit = $drawnLimit;
		return $this;
	}
    /** @return string|null Limit Failover Prize ID */
	public function getLimitFailOverPrizeId(): ?string {
		return $this->limitFailOverPrizeId;
	}
    /** @param string|null $limitFailOverPrizeId Limit Failover Prize ID */
	public function setLimitFailOverPrizeId(?string $limitFailOverPrizeId) {
		$this->limitFailOverPrizeId = $limitFailOverPrizeId;
	}
    /**
     * @param string|null $limitFailOverPrizeId Limit Failover Prize ID
     * @return Prize
     */
	public function withLimitFailOverPrizeId(?string $limitFailOverPrizeId): Prize {
		$this->limitFailOverPrizeId = $limitFailOverPrizeId;
		return $this;
	}
    /** @return string|null Prize Table Name */
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
    /** @param string|null $prizeTableName Prize Table Name */
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
    /**
     * @param string|null $prizeTableName Prize Table Name
     * @return Prize
     */
	public function withPrizeTableName(?string $prizeTableName): Prize {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
    /** @return int|null Draw Weight */
	public function getWeight(): ?int {
		return $this->weight;
	}
    /** @param int|null $weight Draw Weight */
	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}
    /**
     * @param int|null $weight Draw Weight
     * @return Prize
     */
	public function withWeight(?int $weight): Prize {
		$this->weight = $weight;
		return $this;
	}

    public static function fromJson(?array $data): ?Prize {
        if ($data === null) {
            return null;
        }
        return (new Prize())
            ->withPrizeId(array_key_exists('prizeId', $data) && $data['prizeId'] !== null ? $data['prizeId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
            ))
            ->withDrawnLimit(array_key_exists('drawnLimit', $data) && $data['drawnLimit'] !== null ? $data['drawnLimit'] : null)
            ->withLimitFailOverPrizeId(array_key_exists('limitFailOverPrizeId', $data) && $data['limitFailOverPrizeId'] !== null ? $data['limitFailOverPrizeId'] : null)
            ->withPrizeTableName(array_key_exists('prizeTableName', $data) && $data['prizeTableName'] !== null ? $data['prizeTableName'] : null)
            ->withWeight(array_key_exists('weight', $data) && $data['weight'] !== null ? $data['weight'] : null);
    }

    public function toJson(): array {
        return array(
            "prizeId" => $this->getPrizeId(),
            "type" => $this->getType(),
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
            "drawnLimit" => $this->getDrawnLimit(),
            "limitFailOverPrizeId" => $this->getLimitFailOverPrizeId(),
            "prizeTableName" => $this->getPrizeTableName(),
            "weight" => $this->getWeight(),
        );
    }
}