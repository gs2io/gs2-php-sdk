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
 * Request for getStateMachineMaster: Get State Machine Master
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#getstatemachinemaster
 */
class GetStateMachineMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var int Version */
    private $version;
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
     * @return GetStateMachineMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetStateMachineMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return int|null Version */
	public function getVersion(): ?int {
		return $this->version;
	}
    /** @param int|null $version Version */
	public function setVersion(?int $version) {
		$this->version = $version;
	}
    /**
     * @param int|null $version Version
     * @return GetStateMachineMasterRequest
     */
	public function withVersion(?int $version): GetStateMachineMasterRequest {
		$this->version = $version;
		return $this;
	}

    public static function fromJson(?array $data): ?GetStateMachineMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetStateMachineMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withVersion(array_key_exists('version', $data) && $data['version'] !== null ? $data['version'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "version" => $this->getVersion(),
        );
    }
}