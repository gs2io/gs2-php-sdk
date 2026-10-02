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

namespace Gs2\StateMachine\Model;

use Gs2\Core\Model\IModel;


/**
 * Random number status
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#randomstatus
 */
class RandomStatus implements IModel {
	/**
     * @var int Random seed
	 */
	private $seed;
	/**
     * @var array List of used random number
	 */
	private $used;
    /** @return int|null Random seed */
	public function getSeed(): ?int {
		return $this->seed;
	}
    /** @param int|null $seed Random seed */
	public function setSeed(?int $seed) {
		$this->seed = $seed;
	}
    /**
     * @param int|null $seed Random seed
     * @return RandomStatus
     */
	public function withSeed(?int $seed): RandomStatus {
		$this->seed = $seed;
		return $this;
	}
    /** @return array|null List of used random number */
	public function getUsed(): ?array {
		return $this->used;
	}
    /** @param array|null $used List of used random number */
	public function setUsed(?array $used) {
		$this->used = $used;
	}
    /**
     * @param array|null $used List of used random number
     * @return RandomStatus
     */
	public function withUsed(?array $used): RandomStatus {
		$this->used = $used;
		return $this;
	}

    public static function fromJson(?array $data): ?RandomStatus {
        if ($data === null) {
            return null;
        }
        return (new RandomStatus())
            ->withSeed(array_key_exists('seed', $data) && $data['seed'] !== null ? $data['seed'] : null)
            ->withUsed(!array_key_exists('used', $data) || $data['used'] === null ? null : array_map(
                function ($item) {
                    return RandomUsed::fromJson($item);
                },
                $data['used']
            ));
    }

    public function toJson(): array {
        return array(
            "seed" => $this->getSeed(),
            "used" => $this->getUsed() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getUsed()
            ),
        );
    }
}