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

namespace Gs2\Idle\Result;

use Gs2\Core\Model\IResult;
use Gs2\Idle\Model\AcquireAction;
use Gs2\Idle\Model\Status;

/**
 * Result of predictionByUserId: Get a list of available rewards by User ID
 *
 * @see https://docs.gs2.io/api_reference/idle/sdk/#predictionbyuserid
 */
class PredictionByUserIdResult implements IResult {
    /** @var array Rewards */
    private $items;
    /** @var Status Status */
    private $status;

    /** @return array|null Rewards */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items Rewards */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items Rewards
     * @return PredictionByUserIdResult
     */
	public function withItems(?array $items): PredictionByUserIdResult {
		$this->items = $items;
		return $this;
	}

    /** @return Status|null Status */
	public function getStatus(): ?Status {
		return $this->status;
	}

    /** @param Status|null $status Status */
	public function setStatus(?Status $status) {
		$this->status = $status;
	}

    /**
     * @param Status|null $status Status
     * @return PredictionByUserIdResult
     */
	public function withStatus(?Status $status): PredictionByUserIdResult {
		$this->status = $status;
		return $this;
	}

    public static function fromJson(?array $data): ?PredictionByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new PredictionByUserIdResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['items']
            ))
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? Status::fromJson($data['status']) : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "status" => $this->getStatus() !== null ? $this->getStatus()->toJson() : null,
        );
    }
}