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

namespace Gs2\LoginReward\Model;

use Gs2\Core\Model\IModel;


/**
 * Acquire Action
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/#acquireaction
 */
class AcquireAction implements IModel {
	/**
     * @var string Type of Acquire Action
	 */
	private $action;
	/**
     * @var string JSON string of the request used when executing the action
	 */
	private $request;
    /** @return string|null Type of Acquire Action */
	public function getAction(): ?string {
		return $this->action;
	}
    /** @param string|null $action Type of Acquire Action */
	public function setAction(?string $action) {
		$this->action = $action;
	}
    /**
     * @param string|null $action Type of Acquire Action
     * @return AcquireAction
     */
	public function withAction(?string $action): AcquireAction {
		$this->action = $action;
		return $this;
	}
    /** @return string|null JSON string of the request used when executing the action */
	public function getRequest(): ?string {
		return $this->request;
	}
    /** @param string|null $request JSON string of the request used when executing the action */
	public function setRequest(?string $request) {
		$this->request = $request;
	}
    /**
     * @param string|null $request JSON string of the request used when executing the action
     * @return AcquireAction
     */
	public function withRequest(?string $request): AcquireAction {
		$this->request = $request;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireAction {
        if ($data === null) {
            return null;
        }
        return (new AcquireAction())
            ->withAction(array_key_exists('action', $data) && $data['action'] !== null ? $data['action'] : null)
            ->withRequest(array_key_exists('request', $data) && $data['request'] !== null ? $data['request'] : null);
    }

    public function toJson(): array {
        return array(
            "action" => $this->getAction(),
            "request" => $this->getRequest(),
        );
    }
}