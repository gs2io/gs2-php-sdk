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


class AdMob implements IModel {
	/**
     * @var array
	 */
	private $allowAdUnitIds;
	public function getAllowAdUnitIds(): ?array {
		return $this->allowAdUnitIds;
	}
	public function setAllowAdUnitIds(?array $allowAdUnitIds) {
		$this->allowAdUnitIds = $allowAdUnitIds;
	}
	public function withAllowAdUnitIds(?array $allowAdUnitIds): AdMob {
		$this->allowAdUnitIds = $allowAdUnitIds;
		return $this;
	}

    public static function fromJson(?array $data): ?AdMob {
        if ($data === null) {
            return null;
        }
        return (new AdMob())
            ->withAllowAdUnitIds(!array_key_exists('allowAdUnitIds', $data) || $data['allowAdUnitIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['allowAdUnitIds']
            ));
    }

    public function toJson(): array {
        return array(
            "allowAdUnitIds" => $this->getAllowAdUnitIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAllowAdUnitIds()
            ),
        );
    }
}