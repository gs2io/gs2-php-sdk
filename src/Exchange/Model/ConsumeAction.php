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

namespace Gs2\Exchange\Model;

use Gs2\Core\Model\IModel;


/**
 * Consume Action
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#consumeaction
 */
class ConsumeAction implements IModel {
	/**
     * @var string Type of Consume Action
	 */
	private $action;
	/**
     * @var string JSON string of the request used when executing the action
	 */
	private $request;
    /** @return string|null Type of Consume Action */
	public function getAction(): ?string {
		return $this->action;
	}
    /** @param string|null $action Type of Consume Action */
	public function setAction(?string $action) {
		$this->action = $action;
	}
    /**
     * @param string|null $action Type of Consume Action
     * @return ConsumeAction
     */
	public function withAction(?string $action): ConsumeAction {
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
     * @return ConsumeAction
     */
	public function withRequest(?string $request): ConsumeAction {
		$this->request = $request;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeAction {
        if ($data === null) {
            return null;
        }
        return (new ConsumeAction())
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