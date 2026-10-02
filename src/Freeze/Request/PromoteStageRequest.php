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

namespace Gs2\Freeze\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for promoteStage: Promote stage
 *
 * @see https://docs.gs2.io/api_reference/freeze/sdk/#promotestage
 */
class PromoteStageRequest extends Gs2BasicRequest {
    /** @var string Stage name */
    private $stageName;
    /** @return string|null Stage name */
	public function getStageName(): ?string {
		return $this->stageName;
	}
    /** @param string|null $stageName Stage name */
	public function setStageName(?string $stageName) {
		$this->stageName = $stageName;
	}
    /**
     * @param string|null $stageName Stage name
     * @return PromoteStageRequest
     */
	public function withStageName(?string $stageName): PromoteStageRequest {
		$this->stageName = $stageName;
		return $this;
	}

    public static function fromJson(?array $data): ?PromoteStageRequest {
        if ($data === null) {
            return null;
        }
        return (new PromoteStageRequest())
            ->withStageName(array_key_exists('stageName', $data) && $data['stageName'] !== null ? $data['stageName'] : null);
    }

    public function toJson(): array {
        return array(
            "stageName" => $this->getStageName(),
        );
    }
}