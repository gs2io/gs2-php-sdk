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
 * Box Item
 *
 * @see https://docs.gs2.io/api_reference/lottery/sdk/#boxitem
 */
class BoxItem implements IModel {
	/**
     * @var string Prize ID
	 */
	private $prizeId;
	/**
     * @var array List of Acquire Actions
	 */
	private $acquireActions;
	/**
     * @var int Remaining Quantity
	 */
	private $remaining;
	/**
     * @var int Initial Quantity
	 */
	private $initial;
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
     * @return BoxItem
     */
	public function withPrizeId(?string $prizeId): BoxItem {
		$this->prizeId = $prizeId;
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
     * @return BoxItem
     */
	public function withAcquireActions(?array $acquireActions): BoxItem {
		$this->acquireActions = $acquireActions;
		return $this;
	}
    /** @return int|null Remaining Quantity */
	public function getRemaining(): ?int {
		return $this->remaining;
	}
    /** @param int|null $remaining Remaining Quantity */
	public function setRemaining(?int $remaining) {
		$this->remaining = $remaining;
	}
    /**
     * @param int|null $remaining Remaining Quantity
     * @return BoxItem
     */
	public function withRemaining(?int $remaining): BoxItem {
		$this->remaining = $remaining;
		return $this;
	}
    /** @return int|null Initial Quantity */
	public function getInitial(): ?int {
		return $this->initial;
	}
    /** @param int|null $initial Initial Quantity */
	public function setInitial(?int $initial) {
		$this->initial = $initial;
	}
    /**
     * @param int|null $initial Initial Quantity
     * @return BoxItem
     */
	public function withInitial(?int $initial): BoxItem {
		$this->initial = $initial;
		return $this;
	}

    public static function fromJson(?array $data): ?BoxItem {
        if ($data === null) {
            return null;
        }
        return (new BoxItem())
            ->withPrizeId(array_key_exists('prizeId', $data) && $data['prizeId'] !== null ? $data['prizeId'] : null)
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
            ))
            ->withRemaining(array_key_exists('remaining', $data) && $data['remaining'] !== null ? $data['remaining'] : null)
            ->withInitial(array_key_exists('initial', $data) && $data['initial'] !== null ? $data['initial'] : null);
    }

    public function toJson(): array {
        return array(
            "prizeId" => $this->getPrizeId(),
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
            "remaining" => $this->getRemaining(),
            "initial" => $this->getInitial(),
        );
    }
}