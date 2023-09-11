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

namespace Gs2\SkillTree\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetNodeModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $nodeModelName;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetNodeModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getNodeModelName(): ?string {
		return $this->nodeModelName;
	}
	public function setNodeModelName(?string $nodeModelName) {
		$this->nodeModelName = $nodeModelName;
	}
	public function withNodeModelName(?string $nodeModelName): GetNodeModelMasterRequest {
		$this->nodeModelName = $nodeModelName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetNodeModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetNodeModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withNodeModelName(array_key_exists('nodeModelName', $data) && $data['nodeModelName'] !== null ? $data['nodeModelName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "nodeModelName" => $this->getNodeModelName(),
        );
    }
}