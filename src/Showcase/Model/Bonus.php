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

namespace Gs2\Showcase\Model;

use Gs2\Core\Model\IModel;


/**
 * Bonus
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#bonus
 */
class Bonus implements IModel {
	/**
     * @var string Route key
	 */
	private $routeKey;
	/**
     * @var array List of additional Acquire Actions
	 */
	private $acquireActions;
    /** @return string|null Route key */
	public function getRouteKey(): ?string {
		return $this->routeKey;
	}
    /** @param string|null $routeKey Route key */
	public function setRouteKey(?string $routeKey) {
		$this->routeKey = $routeKey;
	}
    /**
     * @param string|null $routeKey Route key
     * @return Bonus
     */
	public function withRouteKey(?string $routeKey): Bonus {
		$this->routeKey = $routeKey;
		return $this;
	}
    /** @return array|null List of additional Acquire Actions */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
    /** @param array|null $acquireActions List of additional Acquire Actions */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
    /**
     * @param array|null $acquireActions List of additional Acquire Actions
     * @return Bonus
     */
	public function withAcquireActions(?array $acquireActions): Bonus {
		$this->acquireActions = $acquireActions;
		return $this;
	}

    public static function fromJson(?array $data): ?Bonus {
        if ($data === null) {
            return null;
        }
        return (new Bonus())
            ->withRouteKey(array_key_exists('routeKey', $data) && $data['routeKey'] !== null ? $data['routeKey'] : null)
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
            ));
    }

    public function toJson(): array {
        return array(
            "routeKey" => $this->getRouteKey(),
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
        );
    }
}