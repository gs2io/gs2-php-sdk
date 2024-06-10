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

namespace Gs2\Ranking2\Model;

use Gs2\Core\Model\IModel;


class AcquireAction implements IModel {
	/**
     * @var string
	 */
	private $action;
	/**
     * @var string
	 */
	private $request;
	public function getAction(): ?string {
		return $this->action;
	}
	public function setAction(?string $action) {
		$this->action = $action;
	}
	public function withAction(?string $action): AcquireAction {
		$this->action = $action;
		return $this;
	}
	public function getRequest(): ?string {
		return $this->request;
	}
	public function setRequest(?string $request) {
		$this->request = $request;
	}
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