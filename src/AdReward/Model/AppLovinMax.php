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


/**
 * AppLovin MAX settings
 *
 * @see https://docs.gs2.io/api_reference/ad_reward/sdk/#applovinmax
 */
class AppLovinMax implements IModel {
	/**
     * @var string Allowed Ad Unit ID
	 */
	private $allowAdUnitId;
	/**
     * @var string AppLovin Event Key
	 */
	private $eventKey;
    /** @return string|null Allowed Ad Unit ID */
	public function getAllowAdUnitId(): ?string {
		return $this->allowAdUnitId;
	}
    /** @param string|null $allowAdUnitId Allowed Ad Unit ID */
	public function setAllowAdUnitId(?string $allowAdUnitId) {
		$this->allowAdUnitId = $allowAdUnitId;
	}
    /**
     * @param string|null $allowAdUnitId Allowed Ad Unit ID
     * @return AppLovinMax
     */
	public function withAllowAdUnitId(?string $allowAdUnitId): AppLovinMax {
		$this->allowAdUnitId = $allowAdUnitId;
		return $this;
	}
    /** @return string|null AppLovin Event Key */
	public function getEventKey(): ?string {
		return $this->eventKey;
	}
    /** @param string|null $eventKey AppLovin Event Key */
	public function setEventKey(?string $eventKey) {
		$this->eventKey = $eventKey;
	}
    /**
     * @param string|null $eventKey AppLovin Event Key
     * @return AppLovinMax
     */
	public function withEventKey(?string $eventKey): AppLovinMax {
		$this->eventKey = $eventKey;
		return $this;
	}

    public static function fromJson(?array $data): ?AppLovinMax {
        if ($data === null) {
            return null;
        }
        return (new AppLovinMax())
            ->withAllowAdUnitId(array_key_exists('allowAdUnitId', $data) && $data['allowAdUnitId'] !== null ? $data['allowAdUnitId'] : null)
            ->withEventKey(array_key_exists('eventKey', $data) && $data['eventKey'] !== null ? $data['eventKey'] : null);
    }

    public function toJson(): array {
        return array(
            "allowAdUnitId" => $this->getAllowAdUnitId(),
            "eventKey" => $this->getEventKey(),
        );
    }
}