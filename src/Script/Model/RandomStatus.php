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

namespace Gs2\Script\Model;

use Gs2\Core\Model\IModel;


class RandomStatus implements IModel {
	/**
     * @var int
	 */
	private $seed;
	/**
     * @var array
	 */
	private $used;
	public function getSeed(): ?int {
		return $this->seed;
	}
	public function setSeed(?int $seed) {
		$this->seed = $seed;
	}
	public function withSeed(?int $seed): RandomStatus {
		$this->seed = $seed;
		return $this;
	}
	public function getUsed(): ?array {
		return $this->used;
	}
	public function setUsed(?array $used) {
		$this->used = $used;
	}
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