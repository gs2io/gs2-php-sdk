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

namespace Gs2\StateMachine\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UpdateStateMachineMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $mainStateMachineName;
    /** @var string */
    private $payload;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateStateMachineMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getMainStateMachineName(): ?string {
		return $this->mainStateMachineName;
	}
	public function setMainStateMachineName(?string $mainStateMachineName) {
		$this->mainStateMachineName = $mainStateMachineName;
	}
	public function withMainStateMachineName(?string $mainStateMachineName): UpdateStateMachineMasterRequest {
		$this->mainStateMachineName = $mainStateMachineName;
		return $this;
	}
	public function getPayload(): ?string {
		return $this->payload;
	}
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
	public function withPayload(?string $payload): UpdateStateMachineMasterRequest {
		$this->payload = $payload;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateStateMachineMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateStateMachineMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMainStateMachineName(array_key_exists('mainStateMachineName', $data) && $data['mainStateMachineName'] !== null ? $data['mainStateMachineName'] : null)
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "mainStateMachineName" => $this->getMainStateMachineName(),
            "payload" => $this->getPayload(),
        );
    }
}