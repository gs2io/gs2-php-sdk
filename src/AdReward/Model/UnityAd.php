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


class UnityAd implements IModel {
	/**
     * @var array
	 */
	private $keys;
	public function getKeys(): ?array {
		return $this->keys;
	}
	public function setKeys(?array $keys) {
		$this->keys = $keys;
	}
	public function withKeys(?array $keys): UnityAd {
		$this->keys = $keys;
		return $this;
	}

    public static function fromJson(?array $data): ?UnityAd {
        if ($data === null) {
            return null;
        }
        return (new UnityAd())
            ->withKeys(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('keys', $data) && $data['keys'] !== null ? $data['keys'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "keys" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getKeys() !== null && $this->getKeys() !== null ? $this->getKeys() : []
            ),
        );
    }
}