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

namespace Gs2\Inbox\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetGlobalMessageMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $globalMessageName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): GetGlobalMessageMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getGlobalMessageName(): ?string {
		return $this->globalMessageName;
	}

	public function setGlobalMessageName(?string $globalMessageName) {
		$this->globalMessageName = $globalMessageName;
	}

	public function withGlobalMessageName(?string $globalMessageName): GetGlobalMessageMasterRequest {
		$this->globalMessageName = $globalMessageName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetGlobalMessageMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetGlobalMessageMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withGlobalMessageName(empty($data['globalMessageName']) ? null : $data['globalMessageName']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "globalMessageName" => $this->getGlobalMessageName(),
        );
    }
}