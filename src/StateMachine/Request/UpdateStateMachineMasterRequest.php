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

/**
 * Request for updateStateMachineMaster: Create or update a new State Machine Master
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#updatestatemachinemaster
 */
class UpdateStateMachineMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Main state machine name */
    private $mainStateMachineName;
    /** @var string State machine definition */
    private $payload;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateStateMachineMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateStateMachineMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Main state machine name */
	public function getMainStateMachineName(): ?string {
		return $this->mainStateMachineName;
	}
    /** @param string|null $mainStateMachineName Main state machine name */
	public function setMainStateMachineName(?string $mainStateMachineName) {
		$this->mainStateMachineName = $mainStateMachineName;
	}
    /**
     * @param string|null $mainStateMachineName Main state machine name
     * @return UpdateStateMachineMasterRequest
     */
	public function withMainStateMachineName(?string $mainStateMachineName): UpdateStateMachineMasterRequest {
		$this->mainStateMachineName = $mainStateMachineName;
		return $this;
	}
    /** @return string|null State machine definition */
	public function getPayload(): ?string {
		return $this->payload;
	}
    /** @param string|null $payload State machine definition */
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
    /**
     * @param string|null $payload State machine definition
     * @return UpdateStateMachineMasterRequest
     */
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