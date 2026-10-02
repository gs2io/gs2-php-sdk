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

namespace Gs2\Deploy\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for preUpdateStack: Prepare to update Stack (pre-upload)
 *
 * @see https://docs.gs2.io/api_reference/deploy/sdk/#preupdatestack
 */
class PreUpdateStackRequest extends Gs2BasicRequest {
    /** @var string Stack name */
    private $stackName;
    /** @return string|null Stack name */
	public function getStackName(): ?string {
		return $this->stackName;
	}
    /** @param string|null $stackName Stack name */
	public function setStackName(?string $stackName) {
		$this->stackName = $stackName;
	}
    /**
     * @param string|null $stackName Stack name
     * @return PreUpdateStackRequest
     */
	public function withStackName(?string $stackName): PreUpdateStackRequest {
		$this->stackName = $stackName;
		return $this;
	}

    public static function fromJson(?array $data): ?PreUpdateStackRequest {
        if ($data === null) {
            return null;
        }
        return (new PreUpdateStackRequest())
            ->withStackName(array_key_exists('stackName', $data) && $data['stackName'] !== null ? $data['stackName'] : null);
    }

    public function toJson(): array {
        return array(
            "stackName" => $this->getStackName(),
        );
    }
}