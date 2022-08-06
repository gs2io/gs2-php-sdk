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


class Prize implements IModel {
	/**
     * @var string
	 */
	private $prizeId;
	/**
     * @var string
	 */
	private $type;
	/**
     * @var array
	 */
	private $acquireActions;
	/**
     * @var int
	 */
	private $drawnLimit;
	/**
     * @var string
	 */
	private $limitFailOverPrizeId;
	/**
     * @var string
	 */
	private $prizeTableName;
	/**
     * @var int
	 */
	private $weight;
	public function getPrizeId(): ?string {
		return $this->prizeId;
	}
	public function setPrizeId(?string $prizeId) {
		$this->prizeId = $prizeId;
	}
	public function withPrizeId(?string $prizeId): Prize {
		$this->prizeId = $prizeId;
		return $this;
	}
	public function getType(): ?string {
		return $this->type;
	}
	public function setType(?string $type) {
		$this->type = $type;
	}
	public function withType(?string $type): Prize {
		$this->type = $type;
		return $this;
	}
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
	public function withAcquireActions(?array $acquireActions): Prize {
		$this->acquireActions = $acquireActions;
		return $this;
	}
	public function getDrawnLimit(): ?int {
		return $this->drawnLimit;
	}
	public function setDrawnLimit(?int $drawnLimit) {
		$this->drawnLimit = $drawnLimit;
	}
	public function withDrawnLimit(?int $drawnLimit): Prize {
		$this->drawnLimit = $drawnLimit;
		return $this;
	}
	public function getLimitFailOverPrizeId(): ?string {
		return $this->limitFailOverPrizeId;
	}
	public function setLimitFailOverPrizeId(?string $limitFailOverPrizeId) {
		$this->limitFailOverPrizeId = $limitFailOverPrizeId;
	}
	public function withLimitFailOverPrizeId(?string $limitFailOverPrizeId): Prize {
		$this->limitFailOverPrizeId = $limitFailOverPrizeId;
		return $this;
	}
	public function getPrizeTableName(): ?string {
		return $this->prizeTableName;
	}
	public function setPrizeTableName(?string $prizeTableName) {
		$this->prizeTableName = $prizeTableName;
	}
	public function withPrizeTableName(?string $prizeTableName): Prize {
		$this->prizeTableName = $prizeTableName;
		return $this;
	}
	public function getWeight(): ?int {
		return $this->weight;
	}
	public function setWeight(?int $weight) {
		$this->weight = $weight;
	}
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
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
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
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
            "drawnLimit" => $this->getDrawnLimit(),
            "limitFailOverPrizeId" => $this->getLimitFailOverPrizeId(),
            "prizeTableName" => $this->getPrizeTableName(),
            "weight" => $this->getWeight(),
        );
    }
}