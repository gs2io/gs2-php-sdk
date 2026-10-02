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

namespace Gs2\Script\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteScript: Delete Script
 *
 * @see https://docs.gs2.io/api_reference/script/sdk/#deletescript
 */
class DeleteScriptRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Script name */
    private $scriptName;
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
     * @return DeleteScriptRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteScriptRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Script name */
	public function getScriptName(): ?string {
		return $this->scriptName;
	}
    /** @param string|null $scriptName Script name */
	public function setScriptName(?string $scriptName) {
		$this->scriptName = $scriptName;
	}
    /**
     * @param string|null $scriptName Script name
     * @return DeleteScriptRequest
     */
	public function withScriptName(?string $scriptName): DeleteScriptRequest {
		$this->scriptName = $scriptName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteScriptRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteScriptRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withScriptName(array_key_exists('scriptName', $data) && $data['scriptName'] !== null ? $data['scriptName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "scriptName" => $this->getScriptName(),
        );
    }
}