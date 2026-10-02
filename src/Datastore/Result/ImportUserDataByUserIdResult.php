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

namespace Gs2\Datastore\Result;

use Gs2\Core\Model\IResult;

/**
 * Result of importUserDataByUserId: Execute import of data associated with the specified user ID
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#importuserdatabyuserid
 */
class ImportUserDataByUserIdResult implements IResult {

    public static function fromJson(?array $data): ?ImportUserDataByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new ImportUserDataByUserIdResult());
    }

    public function toJson(): array {
        return array(
        );
    }
}